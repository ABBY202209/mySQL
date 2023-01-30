
// nav
const shrink_btn = document.querySelector(".shrink-btn");
//sidebar-links
const sidebar_links = document.querySelectorAll(".sidebar-links a");
const active_tab = document.querySelector(".active-tab");
const shortcuts = document.querySelector(".sidebar-links h4");
// tooltip
const tooltip_elements = document.querySelectorAll(".tooltip-element");

let activeIndex;



shrink_btn.addEventListener("click", () => {
  // console.log("shrink-btn");
  document.body.classList.toggle("shrink");
  setTimeout(moveActiveTab, 400);

  shrink_btn.classList.add("hovered");

  setTimeout(() => {
    shrink_btn.classList.remove("hovered");
  }, 500);
});


function moveActiveTab() {
  //sidebar-links a >height:53 + li >padding 2.5px *2 =58 + active-tab >top 2.5px 
  let topPosition = activeIndex * 58 + 2.5;
  //  如果大於2要再加f4的height  
  if (activeIndex > 2) {
    topPosition += shortcuts.clientHeight;
  }

  active_tab.style.top = `${topPosition}px`;
}
remove();
function remove() {
  sidebar_links.forEach((sideLink) => sideLink.classList.remove("active"));
  
}
function changeLink() {
  console.log("hi sidebar_links");
  sidebar_links.forEach((sideLink) => sideLink.classList.remove("active"));
  this.classList.add("active");

  activeIndex = this.dataset.active;
  
  moveActiveTab();
  //保留
  localStorage.setItem("activeIndex", activeIndex);
  // console.log("activeIndex",activeIndex);
}
const storedActiveIndex = localStorage.getItem("activeIndex");

if (storedActiveIndex) {
activeIndex = storedActiveIndex;
moveActiveTab();
sidebar_links[activeIndex].classList.add("active");
}

sidebar_links.forEach((link) => link.addEventListener("click", changeLink));

function showTooltip() {
  // console.log("hi show");
  let tooltip = this.parentNode.lastElementChild;
  // console.log("tooltip",tooltip);
  let spans = tooltip.children;
  // console.log(spans);
  let tooltipIndex = this.dataset.tooltip;
  // console.log(tooltipIndex);

  Array.from(spans).forEach((sp) => sp.classList.remove("show"));
  // console.log(spans[tooltipIndex]);

  spans[tooltipIndex].classList.add("show");

  tooltip.style.top = `${(100 / (spans.length * 2)) * (tooltipIndex * 2 + 1)}%`;
}
tooltip_elements.forEach((elem) => {
  elem.addEventListener("mouseover", showTooltip);
});

