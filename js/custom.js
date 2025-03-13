document.addEventListener("DOMContentLoaded", function () {
  const menuLinks = document.querySelectorAll(".navigation__link");
  const header = document.querySelector(".header");
  const burger = document.querySelector(".header__burger");

  menuLinks.forEach(link => {
    link.addEventListener("click", function () {
      header.classList.remove("header--active"); // 關閉 menu
      burger.classList.remove("burger--active"); // 移除漢堡選單的 active 狀態
    });
  });
});