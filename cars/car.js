const navigationHeight = document.querySelector(".navbar").offsetHeight;
console.log(navigationHeight);
document.documentElement.style.setProperty(
  "scroll-padding-top",
  navigationHeight + "px"
);

loadMoreBtn = document.querySelector(".car-packages .load-more");
let currentItem = 2;

loadMoreBtn.onclick = () => {
  let boxes = [
    ...document.querySelectorAll(".car-packages .box-container .box"),
  ];
  for (let i = currentItem; i < currentItem + 4; i++) {
    boxes[i].style.display = "inline-block";
    if (i == boxes.length) {
      break;
    }
  }
  currentItem += 8;
  if (currentItem >= boxes.length) {
    loadMoreBtn.style.display = "none";
  }
};
