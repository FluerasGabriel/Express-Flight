let tl1=gsap.timeline({
});
tl1.from(".image" ,{x:200,opacity:0,duration:1.5});
tl1.from(".TextBox1" ,{x:-200,opacity:0,duration:2},"-=1");

let tl2=gsap.timeline({
});
tl2.from(".WhyToUse" ,{y:-200,opacity:0,duration:2});
tl2.from(".WhyToUseContainer1" ,{x:-200,opacity:0,duration:1.3},"-=1");
tl2.from(".WhyToUseContainer2" ,{x:-200,opacity:0,duration:1.6},"-=1");
tl2.from(".WhyToUseContainer3" ,{x:-200,opacity:0,duration:1.9},"-=1");
tl2.from(".wave1" ,{x:-200,opacity:0,duration:0.6},"-=3");
tl2.from(".wave2" ,{x:-200,opacity:0,duration:0.6},"-=3");
tl2.from(".waveContainer" ,{x:-200,opacity:0,duration:0.6},"-=3.1");
const animate2 = ScrollTrigger.create({
trigger: ".wave1",
animation: tl2,
toggleActions:"restart none resume none"
});
const animete1 = ScrollTrigger.create({
trigger: ".headBar",
animation: tl1,
toggleActions:"restart none none none"
});
