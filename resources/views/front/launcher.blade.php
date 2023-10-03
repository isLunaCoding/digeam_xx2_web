 <!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <script src="/js/event/launcher/jquery-1.7.2.js" type="text/javascript"></script>
    <script src="/js/event/launcher/js.js?v=2.4" type="text/javascript"></script>
    <link href="/css/event/launcher/launcher.css?v=2.4" rel="stylesheet" type="text/css" />
</head>

<body scroll="no">
    <div class="launch">
        <ul class="notice">
            <li class="carouselBox">
                <div class="container" id="DPic">
                    <div class="container2">
                        <ul class="slider slider2" id="UPic" data-val="3">
                            <li>
                                <a href='' target='_blank'>
                                    <img src='/img/event/launcher/20231003-1.jpg'>
                                </a>
                            </li>
                            <li>
                                <a href='' target='_blank'>
                                    <img src='/img/event/launcher/20231003-2.jpg'>
                                </a>
                            </li>
                            <li>
                                <a href='' target='_blank'>
                                    <img src='/img/event/launcher/20231003-1.jpg'>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul class="num" id="UNum">
                        @for ($i = 1; $i <= 3; $i++)
                            <li class>
                                <a href>{{ $i }}</a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </li>
            <li>
                <div id="tabs">
                    <div class="menubox">
                        <ul class="codeDemoUL" id="ulMenu_indexnew">
                            <li class="codeDemomouseOnMenu"
                                onmouseover="showDiv('indexnew',1,3);this.className='codeDemomouseOnMenu'">NEW</li>
                            <li class="codeDemomouseOutMenu"
                                onmouseover="showDiv('indexnew',2,3);this.className='codeDemomouseOnMenu'">活動</li>
                            <li class="codeDemomouseOutMenu"
                                onmouseover="showDiv('indexnew',3,3);this.className='codeDemomouseOnMenu'">系統</li>
                            {{-- <li style="border: 0px !important;margin-left:10px"><a class='more' target="_blank"
                                    href="https://rco.digeam.com/announcement">+More</a></li> --}}
                        </ul>
                        <a class='more' target="_blank" href="https://rco.digeam.com/announcement">More</a>

                    </div>
                    <div class="line"></div>
                    <div id="newlist">
                        <div class="codeDemoDiv" id="divCodeindexnew_1">
                            <div class="newslist2">
                                <ul>
                                    <li>
                                        <div class="textBox">
                                            <a href="" target="_blank" class="textTitle">
                                                仙俠世界貳 事前預約開放中！1111155555555555551111555555555111
                                            </a>
                                            <span class="textTime">2023/09/18</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="textBox">
                                            <a href="" target="_blank" class="textTitle">
                                                仙俠世界貳 事前預約開放中！1111155555555555551111555555555111
                                            </a>
                                            <span class="textTime">2023/09/18</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="textBox">
                                            <a href="" target="_blank" class="textTitle">
                                                仙俠世界貳 事前預約開放中！1111155555555555551111555555555111
                                            </a>
                                            <span class="textTime">2023/09/18</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="textBox">
                                            <a href="" target="_blank" class="textTitle">
                                                仙俠世界貳 事前預約開放中！1111155555555555551111555555555111
                                            </a>
                                            <span class="textTime">2023/09/18</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="textBox">
                                            <a href="" target="_blank" class="textTitle">
                                                仙俠世界貳 事前預約開放中！1111155555555555551111555555555111
                                            </a>
                                            <span class="textTime">2023/09/18</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="codeDemoDiv" id="divCodeindexnew_2" style="display:none">
                            <div class="newslist2">
                                <ul>
                                    <li>
                                        <div class="textBox">
                                            <a href="" target="_blank" class="textTitle">
                                                仙俠世界貳 事前預約開放中！1111155555555555551111555555555111
                                            </a>
                                            <span class="textTime">2023/09/18</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="codeDemoDiv" id="divCodeindexnew_3" style="display:none">
                            <div class="newslist2">
                                <ul>
                                    <li>
                                        <div class="textBox">
                                            <a href="" target="_blank" class="textTitle">
                                                仙俠世界貳 事前預約開放中！1111155555555555551111555555555111
                                            </a>
                                            <span class="textTime">2023/09/18</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</body>

</html>

<script>

var playimages = function(A) {
  return "string" == typeof A ? document.getElementById(A) : A
};
var Class = {
  create: function() {
      return function() {
          this.initialize.apply(this, arguments)
      }
  }
};
Object.extend = function(A, B) {
  for (var C in B) {
      A[C] = B[C]
  }
  return A
}
;
var TransformView = Class.create();
TransformView.prototype = {
  initialize: function(F, C, B, A, E) {
      if (B <= 0 || A <= 0) {
          return
      }
      var G = playimages(F)
        , H = playimages(C)
        , D = this;
      this.Index = 0;
      this._timer = null;
      this._slider = H;
      this._parameter = B;
      this._count = A || 0;
      this._target = 0;
      this.SetOptions(E);
      this.Up = !!this.options.Up;
      this.Step = Math.abs(this.options.Step);
      this.Time = Math.abs(this.options.Time);
      this.Auto = !!this.options.Auto;
      this.Pause = Math.abs(this.options.Pause);
      this.onStart = this.options.onStart;
      this.onFinish = this.options.onFinish;
      G.style.overflow = "hidden";
      G.style.position = "relative";
      H.style.position = "absolute";
      H.style.top = H.style.left = 0
  },
  SetOptions: function(A) {
      this.options = {
          Up: true,
          Step: 3,
          Time: 20,
          Auto: true,
          Pause: 8000,
          onStart: function() {},
          onFinish: function() {}
      };
      Object.extend(this.options, A || {})
  },
  Start: function() {
      if (this.Index < 0) {
          this.Index = this._count - 1
      } else {
          if (this.Index >= this._count) {
              this.Index = 0
          }
      }
      this._target = -1 * this._parameter * this.Index;
      this.onStart();
      this.Move()
  },
  Move: function() {
      clearTimeout(this._timer);
      var B = this
        , A = this.Up ? "top" : "left"
        , C = parseInt(this._slider.style[A]) || 0
        , D = this.GetStep(this._target, C);
      if (D != 0) {
          this._slider.style[A] = (C + D) + "px";
          this._timer = setTimeout(function() {
              B.Move()
          }, this.Time)
      } else {
          this._slider.style[A] = this._target + "px";
          this.onFinish();
          if (this.Auto) {
              this._timer = setTimeout(function() {
                  B.Index++;
                  B.Start()
              }, this.Pause)
          }
      }
  },
  GetStep: function(A, C) {
      var B = (A - C) / this.Step;
      if (B == 0) {
          return 0
      }
      if (Math.abs(B) < 1) {
          return (B > 0 ? 1 : -1)
      }
      return B
  },
  Stop: function(A, B) {
      clearTimeout(this._timer);
      this._slider.style[this.Up ? "top" : "left"] = this._target + "px"
  }
};
function Each(C, B) {
  var D;
  for (var A = 0, D = C.length; A < D; A++) {
      B(C[A], A)
  }
}
function LoadPicRun(A, D, F, B, G) {
  console.log(A, D, F, B, G)
  var E = playimages(F).getElementsByTagName("li");
  var C = new TransformView(A,D,B,G,{
      onStart: function() {
          Each(E, function(I, H) {
              I.className = C.Index == H ? "on" : ""
          })
      },
      Up: false
  });
  C.Start();
  Each(E, function(I, H) {
      I.onmouseover = function() {
          I.className = "on";
          C.Auto = false;
          C.Index = H;
          C.Start()
      }
      ;
      I.onmouseout = function() {
          I.className = "";
          C.Auto = true;
          C.Start()
      }
  })
}
;
    countIMG = $('#UPic').data('val')

    function showDiv(C, B, D) {
        for (var A = 1; A <= D; A++) {
            document.getElementById("divCode" + C + "_" + String(A)).style.display = "none"
        }
        document.getElementById("divCode" + C + "_" + B).style.display = "block";
        for (var A in document.getElementById("ulMenu_" + C).getElementsByTagName("LI")) {
            document.getElementById("ulMenu_" + C).getElementsByTagName("LI")[A].className = "codeDemomouseOutMenu"
        }
    }
    $(document).ready(function() {
        LoadPicRun("DPic", "UPic", "UNum", 566, countIMG);
    });
</script>
