/* 位置・移動関連

x, y, z: X、Y、Z軸の位置を指定します。
left, right, top, bottom: CSSのポジションプロパティを指定します。
xPercent, yPercent: 位置をパーセンテージで指定します。
回転・スケール関連

rotate, rotateX, rotateY, rotateZ: 回転角度を指定します。
scale, scaleX, scaleY, scaleZ: スケール（拡大・縮小）を指定します。
skewX, skewY: 傾きを指定します。
透明度・表示関連

opacity: 透明度を指定します。
autoAlpha: opacityとvisibilityを組み合わせたプロパティ。autoAlpha: 0はopacity: 0とvisibility: hiddenに相当します。
visibility: CSSのvisibilityプロパティを指定します。
色関連

backgroundColor, borderColor, color: CSSの色を指定します。
fill, stroke: SVGの塗りつぶし色や線の色を指定します。
サイズ関連

width, height: 幅と高さを指定します。
maxWidth, maxHeight, minWidth, minHeight: 最大・最小の幅と高さを指定します。
時間・遅延関連

duration: アニメーションの継続時間を指定します。
delay: アニメーション開始までの遅延時間を指定します。
repeat, repeatDelay: 繰り返し回数と繰り返し間の遅延時間を指定します。
アニメーションコントロール

ease: イージング関数を指定します（例：Power1.easeInOut）。
paused: 初期状態でアニメーションを停止するかどうかを指定します。
yoyo: アニメーションを逆再生して往復させるかどうかを指定します。
その他のプロパティ

textContent: テキスト内容を指定します。
scrollTo: スクロール位置を指定します（ScrollToPluginが必要）。
morphSVG: SVGの形状を変形させる（MorphSVGPluginが必要）。*/

gsap.to(".circle", {
  // x, y, z: X、Y、Z軸の位置を指定します。left, right, top, bottom: CSSのポジションプロパティを指定します。
  x: 200,
  y: 100,
  // xPercent, yPercent: 位置をパーセンテージで指定します。回転・スケール関連
  // rotation: 45,
  // scale: 1.5,
  // backgroundColor: '#ff0000',
  // duration: 2,
  // ease: 'Power1.easeInOut',
  // repeat: -1,
  // yoyo: true
});

gsap.to(".yellow", {
  // x, y, z: X、Y、Z軸の位置を指定します。left, right, top, bottom: CSSのポジションプロパティを指定します。
  left: 100,
  top: 50,
  duration: 2,
  // xPercent, yPercent: 位置をパーセンテージで指定します。回転・スケール関連
  rotation: 45,
  scale: 1.5,
  backgroundColor: "#ff0000",
  duration: 2,
  ease: "Power1.easeInOut",
  repeat: -1,
  yoyo: true,
});

gsap.to(".heart", {
  scale: 1.1,
  duration: 1,
  ease: "Power1.easeInOut",
  repeat: -1,
  yoyo: true,
});

// gsap.to(".heart", {
//   x: 200,
//   scrollTrigger: {
//     trigger: ".heart",
//     start: "top center",
//     end: "bottom 20%",
//     markers: true,
//     toggleActions: "play none none reverse", //リプレイ再生
//   },
// });

// gsap.to(".heart", {
//   x: 200,
//   scrollTrigger: {
//     trigger: ".heart",
//     start: "top 80%",
//     end: "bottom 20%",
//     markers: true,
//     toggleActions: "play none none reverse",
//   },
// });

// gsap.to(".heart", {
//   x: 200,
//   scrollTrigger: {
//     trigger: ".heart",
//     start: "top 80%", //アニメーションのスタート位置 画面位置/要素位置
//     end: "bottom 20%", //アニメーションの終了位置　画面位置/要素位置
//     markers: true,
//     toggleActions: "play none none reverse",
//   },
// });

gsap.to(".image-wrap", {
  x: 200,
  scrollTrigger: {
    trigger: ".image-wrap",
    start: "top 80%", //アニメーションのスタート位置 画面位置/要素位置
    end: "bottom 20%", //アニメーションの終了位置　画面位置/要素位置
    markers: true,
    toggleActions: "play none none reverse",
  },
});
