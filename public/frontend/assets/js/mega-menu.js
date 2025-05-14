document.addEventListener("DOMContentLoaded", function () {
  const menuItem = document.querySelector(".menu-item-has-children");
  const megaMenu = menuItem.querySelector(".mega-sub-menu");
  const container = document.querySelector(".header-horizontal-menu");

  // Step 1: Move mega menu to container level
  container.appendChild(megaMenu);

  // Step 2: Show mega menu on hover with animation
  menuItem.addEventListener("mouseenter", function () {
    const rect = menuItem.getBoundingClientRect();
    const containerRect = container.getBoundingClientRect();

    megaMenu.style.display = "flex";
    megaMenu.style.position = "absolute";
    // megaMenu.style.top = `${menuItem.offsetHeight}px`;
    megaMenu.style.top = `80px`;
    megaMenu.style.left = "0";
    megaMenu.style.right = "0";
    megaMenu.style.width = "100%";
    megaMenu.style.transform = "rotateX(0deg)";
    megaMenu.style.opacity = "1";
    megaMenu.style.visibility = "visible";
    megaMenu.style.transition = "all 0.3s linear";
    megaMenu.style.zIndex = "99";
  });

  menuItem.addEventListener("mouseleave", function () {
    megaMenu.style.transform = "rotateX(-90deg)";
    megaMenu.style.opacity = "0";
    megaMenu.style.visibility = "hidden";
  });

  // Hide menu when mouse leaves the mega menu itself
  megaMenu.addEventListener("mouseleave", function () {
    megaMenu.style.transform = "rotateX(-90deg)";
    megaMenu.style.opacity = "0";
    megaMenu.style.visibility = "hidden";
  });

  megaMenu.addEventListener("mouseenter", function () {
    megaMenu.style.transform = "rotateX(0deg)";
    megaMenu.style.opacity = "1";
    megaMenu.style.visibility = "visible";
  });
});