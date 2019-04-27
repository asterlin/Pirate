//PIXI地圖
    //先設定好變數
    var HEIGHT = window.innerHeight,
        WIDTH = window.innerWidth;

    var maskIllu, frameT,frameB,frameL,frameR;

    var sizeL = 1024;
    var sizeM = 960;
    var sizeS = 768;
    var sizeXS = 480;

    var pixiCanvas = document.getElementById("pixiCanvas");
    var framePadding = -20;
    var framePaddingTarget = 40;
    var parallaxCoeff = 3;
    var globalScale = 1;
    var brightness = 1;
    var repulsion = .95;
    var noise = .0;

    var elements = [];
    var mousePos = {x:window.innerWidth/2, y:window.innerHeight/2};
    var myDisplayResolution = window.devicePixelRatio;

    //偵測瀏覽器支援何種渲染方式，是WebGL or canvas，回傳PIXI.WebGLRender之類的，相當於application.renderer
    var renderer = PIXI.autoDetectRenderer(800, 600, {
        antialiasing:true,
        transparent:true,
        resolution:1,
    });

    pixiCanvas.appendChild(renderer.view); //renderer.view 相當於 app.view
    var container = new PIXI.Container();
    //這裡是將noise及brightness的變數值放入相對應的PIXI函數內，有點不懂用意...
    var noiseFilter = new PIXI.filters.NoiseFilter()
    noiseFilter.noise = noise;
    var colorMatrix = new PIXI.filters.ColorMatrixFilter();
    colorMatrix.brightness(brightness);
    container.filters = [noiseFilter, colorMatrix];

    //loaders.loader跟PIXI.loader的差別好像是後者是PIXI以包裝好的，前者還可以自己加很多功能進去?
    var loader = new PIXI.loaders.Loader('image/',30); //前述網址是載入後續sprites的目錄
    loader.add('map', 'map.json');
    loader.once('complete', onAssetsLoaded);
    loader.load();

    window.addEventListener('resize', onWindowResize, false);

    document.addEventListener("mousemove", onMouseMove); //這裡之後應該要改成hover有效的框框

    function onMouseMove(event) {
        var tx = -1 + (event.clientX / WIDTH)*2;//在螢幕左半邊時結果<0，右半邊>0
        var ty = 1 - (event.clientY / HEIGHT)*2;//在螢幕上半部結果>0，下半部<0
        mousePos = {x:tx, y:ty};
        globalScale = .8 + (event.clientX / WIDTH)*.4; //在螢幕左半邊時結果<1，右半邊>1
        repulsion = .95 + (event.clientX / WIDTH)*.05;//在螢幕最右邊時結果=1
    }

    function onWindowResize() {
        HEIGHT = window.innerHeight*.8; //雖然...總之這裡可以成功修改比例
        WIDTH = window.innerWidth;
        renderer.resize(WIDTH, HEIGHT);//重新調整渲染畫布大小
        repositionAll();
    }

    function repositionAll(speed){
    
        for(var i=0, l = elements.length; i<l; i++){
            var el = elements[i]; //這是所有的sprite，而且都是用後面floatingObject創出的物件，並且在很後面給了updatePosition這個方法
            el.updatePosition(speed);
        }
        repositionFrame();
    }
    function repositionFrame(){ //基本上就是設定外框的位置
  
        if (frameT){
            frameT.sprite.width = WIDTH - framePadding*2;
            frameT.sprite.y = framePadding;
            frameT.sprite.x = framePadding; //padding就是我們給的他與視窗的距離
            
            frameB.sprite.width = WIDTH - framePadding*2;
            frameB.sprite.y = HEIGHT - framePadding;
            frameB.sprite.x = framePadding;
            
            frameR.sprite.width = HEIGHT- framePadding*2;
            frameR.sprite.x = WIDTH- framePadding;
            frameR.sprite.y = framePadding;
            
            frameL.sprite.width = HEIGHT - framePadding*2;
            frameL.sprite.x = framePadding;
            frameL.sprite.y = framePadding;
            
        }
        
        
        if (maskIllu){ //此處的遮罩，應該是外框
            maskIllu.clear();
            maskIllu.beginFill(0xFFFF00);
            maskIllu.drawRect(framePadding+2, framePadding+2, WIDTH-framePadding*2, HEIGHT-framePadding*2);
        }
    }
    TweenMax.to(this, 4, {framePadding:framePaddingTarget, ease:Power4.easeInOut, onUpdate:repositionFrame}); //外框進入動畫的時間，

    //載入好JSON後，將所有圖片以他自己設計的floatingObject物件建立
    function onAssetsLoaded(loader,resources){

        illu = new PIXI.Sprite();
        container.addChild(illu);
        
        maskIllu = new PIXI.Graphics(); //用PIXI畫幾何圖
        container.addChild(maskIllu);
        illu.mask = maskIllu; //把illu跟maskIllu都放進container裡後，以後者為遮罩遮住illu

        //要被illu遮住的，就放到illu裡面

        land = new FloatingObject("land.png", illu ,{ depth: 0,initPcX:.5,initPcY:.5,initScaleX:1,initScaleY:1,hideBelowX:sizeS});

        compass = new FloatingObject("compass.png",illu,{depth:-5,initDispX:200,initDispY:100,hideBelowX:sizeL,floatRotate:90,})

        mountain = new FloatingObject("mountain.png",illu,{
            depth:0, initPcX:.5, initPcY:.35,initDispX:-100, hideBelowX:sizeS
        })

        cave = new FloatingObject("cave.png",illu,{
            depth:0, initPcX:.5, initPcY:.35,initDispX:200, hideBelowX:sizeS
        })

        tree2 = new FloatingObject("tree2.png",illu,{
            depth:0, initPcX:.5, initPcY:.45,initDispX:-290, hideBelowX:sizeS
        })
        tree3 = new FloatingObject("tree3.png",illu,{
            depth:0, initPcX:.5, initPcY:.55,initDispX:180, hideBelowX:sizeS
        })
        tree4 = new FloatingObject("tree4.png",illu,{
            depth:0, initPcX:.5, initPcY:.44,initDispX:290, hideBelowX:sizeS
        })

        chestL = new FloatingObject("chest.png",illu,{
            depth:-1, initPcX:.5, initPcY:.39,initDispX:-180, hideBelowX:sizeS,floatFrequency:.03,floatAmplitude:2,
        })
        chestR = new FloatingObject("chest.png",illu,{
            depth:-1, initPcX:.5, initPcY:.38,initDispX:230, hideBelowX:sizeS,floatFrequency:.03,floatAmplitude:2,
        })

        
        castle = new FloatingObject("castle.png",illu,{
            depth:2, initPcX:.5, initPcY:.54,initDispX:-250, hideBelowX:sizeS,floatFrequency:.02,floatAmplitude:2,
        })
        market = new FloatingObject("market.png",illu,{
            depth:2, initPcX:.5, initPcY:.48, hideBelowX:sizeS,floatFrequency:.02,floatAmplitude:2,
        })
        bar = new FloatingObject("bar.png",illu,{
            depth:2, initPcX:.5, initPcY:.57,initDispX:260, hideBelowX:sizeS,floatFrequency:.02,floatAmplitude:2,
        })
        ship = new FloatingObject("ship.png",illu,{
            depth:2, initPcX:.5, initPcY:.6,initDispX:500, hideBelowX:sizeS,floatFrequency:.02,floatAmplitude:2,
        })
        waveC9 = new FloatingObject("wave6.png",illu,{depth:-3, initPcX:.5, initPcY:.68,initDispX:500, floatFrequency:.01,floatAmplitude:1,hideBelowX:sizeS})


        band1 = new FloatingObject("band1.png",illu,{
            depth:3, initPcX:.5, initPcY:.54,initDispX:-250, hideBelowX:sizeS,floatFrequency:.02,floatAmplitude:4,
        })
        band2 = new FloatingObject("band2.png",illu,{
            depth:3, initPcX:.5, initPcY:.48, hideBelowX:sizeS,floatFrequency:.02,floatAmplitude:4,
        })
        band3 = new FloatingObject("band3.png",illu,{
            depth:3, initPcX:.5, initPcY:.57,initDispX:260, hideBelowX:sizeS,floatFrequency:.02,floatAmplitude:4,
        })
        band4 = new FloatingObject("band4.png",illu,{
            depth:3, initPcX:.5, initPcY:.6,initDispX:500, hideBelowX:sizeS,floatFrequency:.02,floatAmplitude:4,
        })

        tree1 = new FloatingObject("tree1.png",illu,{
            depth:4, initPcX:.5, initPcY:.64,initDispX:-290, hideBelowX:sizeS
        })
        tree5 = new FloatingObject("tree5.png",illu,{
            depth:4, initPcX:.5, initPcY:.71,initDispX:260, hideBelowX:sizeS
        })

        waveL1 = new FloatingObject("wave1.png",illu,{depth:-3, initPcX:.1, initPcY:.3,floatFrequency:.01,floatAmplitude:1,hideBelowX:sizeL})
        waveL2 = new FloatingObject("wave2.png",illu,{depth:-1, initPcX:.2, initPcY:.4,floatFrequency:.03,floatAmplitude:2,hideBelowX:sizeXS})
        waveL3 = new FloatingObject("wave5.png",illu,{depth:-1, initPcX:.05, initPcY:.6,floatFrequency:.03,floatAmplitude:4,hideBelowX:sizeL})
        waveL4 = new FloatingObject("wave4.png",illu,{depth:-1, initPcX:.12, initPcY:.8,floatFrequency:.02,floatAmplitude:4,hideBelowX:sizeXS})
        
        waveR1 = new FloatingObject("wave1.png",illu,{depth:-3, initPcX:.9, initPcY:.15,floatFrequency:.01,floatAmplitude:1, hideBelowX:sizeL})
        waveR2 = new FloatingObject("wave2.png",illu,{depth:-3, initPcX:.95, initPcY:.23,floatFrequency:.01,floatAmplitude:1, hideBelowX:sizeL})
        waveR3 = new FloatingObject("wave3.png",illu,{depth:-1, initPcX:.88, initPcY:.52,floatFrequency:.03,floatAmplitude:2, hideBelowX:sizeXS})
        waveR4 = new FloatingObject("wave4.png",illu,{depth:-1, initPcX:.85, initPcY:.8, floatFrequency:.02,floatAmplitude:4,hideBelowX:sizeXS})

        
        waveC1 = new FloatingObject("wave1.png",illu,{depth:-3, initPcX:.3, initPcY:.3, floatFrequency:.01,floatAmplitude:1,hideBelowX:sizeS})
        waveC2 = new FloatingObject("wave2.png",illu,{depth:-3, initPcX:.38, initPcY:.2, floatFrequency:.01,floatAmplitude:1,hideBelowX:sizeS})
        waveC3 = new FloatingObject("wave5.png",illu,{depth:-3, initPcX:.48, initPcY:.65,floatFrequency:.03,floatAmplitude:4, hideBelowX:sizeS})
        waveC4 = new FloatingObject("wave4.png",illu,{depth:-1, initPcX:.5, initPcY:.85,floatFrequency:.02,floatAmplitude:4, hideBelowX:sizeS})
        waveC5 = new FloatingObject("wave1.png",illu,{depth:-1, initPcX:.55, initPcY:.7, floatFrequency:.03,floatAmplitude:4,hideBelowX:sizeS})
        waveC6 = new FloatingObject("wave2.png",illu,{depth:-1, initPcX:.66, initPcY:.9, floatFrequency:.02,floatAmplitude:4,hideBelowX:sizeS})
        waveC7 = new FloatingObject("wave3.png",illu,{depth:-3, initPcX:.2, initPcY:.7, floatFrequency:.01,floatAmplitude:1,hideBelowX:sizeS})
        waveC8 = new FloatingObject("wave5.png",illu,{depth:-3, initPcX:.8, initPcY:.3, floatFrequency:.01,floatAmplitude:1,hideBelowX:sizeS})

        
        //外框放這裡
        frame = new PIXI.Sprite();
        container.addChild(frame);

        frameT = new FloatingObject("frame.png",frame,{centerPivotX:false, initDispX:framePadding, initDispY:framePadding, affectedByScale:false,});

        frameB = new FloatingObject("frame.png",frame,{centerPivotX:false, initDispX:framePadding, initPcY:1, initDispY:-framePadding, affectedByScale:false,});
        
        frameL = new FloatingObject("frame.png",frame,{centerPivotX:false,initRotation:Math.PI/2, initDispX:framePadding, initDispY:framePadding, affectedByScale:false,});

        frameR = new FloatingObject("frame.png",frame,{centerPivotX:false,initRotation:Math.PI/2,initPcX:1, initDispX:-framePadding, initDispY:framePadding, affectedByScale:false,});



        
        //來執行吧
        onWindowResize();
        animate();
    }


    //作者自己製作的floating object物件
    var FloatingObject = function(texName, parent, params){
        this.params = params || {};
        this.initPcX = this.params.initPcX || 0; //初始X軸位置%
        this.initPcY = this.params.initPcY || 0; //初始Y軸位置%
        this.initDispX = this.params.initDispX || 0; //初始X軸位置px
        this.initDispY = this.params.initDispY || 0; //初始Y軸位置px
        this.depth = this.params.depth || 0; //越小越遠
        this.tiling = (this.params.tiling) ? true : false; //重複貼上
        this.initRotation = this.params.initRotation || 0; 
        this.initScaleX = this.params.initScaleX || 1; //X軸縮放
        this.initScaleY = this.params.initScaleY || 1; //Y軸縮放
        this.affectedByScale = (this.params.affectedByScale==false)? false : true; //是否隨滑鼠縮放
        this.centerPivotX = (this.params.centerPivotX==false) ? false : true; //是否將sprite原點設至X中心
        this.centerPivotY = (this.params.centerPivotY==false)? false : true;//是否將sprite原點設至Y中心
        this.hideBelowX = this.params.hideBelowX || 0; //寬度小於多少時隱藏
        this.hideBelowY = this.params.hideBelowY || 0; //高度小於多少時隱藏
        this.floatFrequency = this.params.floatFrequency || 0; //震動頻率
        this.floatAmplitude= this.params.floatAmplitude || 0; //震動幅度
        this.floatAngle = this.params.floatAngle || 0; //找不出玄機...
        this.floatRotate = this.params.floatRotate || 0;//想讓它隨滑鼠旋轉

        this.texName = texName;
        this.visible = true;
        
        this.parent = parent;
        if (this.tiling){
            this.sprite = PIXI.TilingSprite.fromFrame(texName);
        }else{
            this.sprite = PIXI.Sprite.fromFrame(texName);  
        }
        
        
        if (this.centerPivotX) this.sprite.pivot.x = this.sprite.width/2;
        if (this.centerPivotY) this.sprite.pivot.y = this.sprite.height/2;
            
        
        
        this.parent.addChild(this.sprite);
        elements.push(this);
        
        this.updatePosition();
    }

    //prototype是說，每個JS物件被創建時，都有個預設屬性是prototype了，而它也有一些函式是可以使用的，下方應該是把updaatePosition這個函式也加入prototype屬性當中
    FloatingObject.prototype.updatePosition = function(speed){
        var sp = speed || 0;
        
        var floatY = 0;
        
        //如果此sprite有給flo..freq..，就會影響到它漂浮的振福、高度
        if (this.floatFrequency>0){
            this.floatAngle += this.floatFrequency;
            floatY = Math.cos(this.floatAngle)*this.floatAmplitude*2;
        }
        //initPcX最大值為1，iniD..+-幾百，
        var tx = (WIDTH*this.initPcX) + this.initDispX - mousePos.x * this.depth * parallaxCoeff;
        var ty = (HEIGHT*this.initPcY) + this.initDispY + floatY + mousePos.y * this.depth * parallaxCoeff;
        
        var tsx = this.initScaleX;
        var tsy = this.initScaleY;
        
        
        if (this.affectedByScale){
            var ratioS = (1 + ((this.depth-18)/100)); //depth越大，代表在畫面越前面
            var ratioT = (1 + ((this.depth-18)/50));
            
            tsx *= globalScale * ratioS;
            tsy *= globalScale * ratioS;
            

            tx = (WIDTH/2) + (tx - WIDTH/2) * globalScale * repulsion; 
            ty = (HEIGHT/2) + (ty - HEIGHT/2) * globalScale * repulsion; 
        }
        if(this.floatRotate>0){
            TweenMax.to(this.sprite, .5, {rotation:mousePos.x * ((Math.PI/360) * this.floatRotate)});
        }else{
            this.sprite.rotation = this.initRotation;
        }
        
        
        // not visible but it should be visible 因為窄螢幕隱藏的東西，螢幕寬時出現
        if (!this.visible && WIDTH > this.hideBelowX && HEIGHT > this.hideBelowY){
            this.visible = true;
            TweenMax.to(this.sprite.scale, 1, {x:tsx, y:tsy, ease:Power4.easeInOut});
            this.sprite.x = tx;
            this.sprite.y = ty;
            return;
        // not visible and it should stay not visible
        }else if (!this.visible){
            this.sprite.x = tx;
            this.sprite.y = ty;
            return;
            
        // visible but it should be not visible 
        }else if (this.visible && (WIDTH < this.hideBelowX || HEIGHT < this.hideBelowY)){
            this.visible = false;
            TweenMax.killTweensOf(this.sprite.scale);
            TweenMax.to(this.sprite.scale, 1, {x:0, y:0, ease:Power4.easeInOut});
            
            return;
        }
        
        this.visible = true;
        
        if (this.affectedByScale){
            this.sprite.x += (tx-this.sprite.x) *.1;
            this.sprite.y += (ty-this.sprite.y) *.1;
            this.sprite.scale.x += (tsx-this.sprite.scale.x)*.1;
            this.sprite.scale.y += (tsy-this.sprite.scale.y)*.1;
            
            //TweenMax.to(this.sprite.scale, .5, {x:tsx, y:tsy, ease:Power4.easeInOut});
        
        }else{
            this.sprite.x = tx;
            this.sprite.y = ty;
            this.sprite.scale.x = tsx;
            this.sprite.scale.y = tsy;
        }

        

        //this.sprite.visible = (WIDTH > this.hideBelowX) && (HEIGHT > this.hideBelowY);
    }


    function animate() {
        requestAnimationFrame( animate );
        repositionAll();
        renderer.render(container);
    }
