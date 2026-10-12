(function () {
  "use strict";

  // ============ MODAL ============
  const modal = document.getElementById("modal");
  const openBtns = document.querySelectorAll("[data-modal-open]");
  const closeEls = document.querySelectorAll("[data-modal-close]");

  function openModal() {
    if (!modal) return;
    modal.hidden = false;
    document.body.style.overflow = "hidden";
    const firstInput = modal.querySelector("input, select, textarea, button");
    if (firstInput) firstInput.focus();
  }

  function closeModal() {
    if (!modal) return;
    modal.hidden = true;
    document.body.style.overflow = "";
  }

  openBtns.forEach((btn) => btn.addEventListener("click", openModal));
  closeEls.forEach((el) => el.addEventListener("click", closeModal));

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && modal && !modal.hidden) closeModal();
  });

  // ============ SMOOTH SCROLL ============
  document.querySelectorAll('a[href^="#"]').forEach((link) => {
    link.addEventListener("click", (e) => {
      const id = link.getAttribute("href");
      if (id === "#") return;
      const target = document.querySelector(id);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: "smooth", block: "start" });
      }
    });
  });

  // ============ LAZY LOAD FALLBACK ============
  if (!("loading" in HTMLImageElement.prototype)) {
    const images = document.querySelectorAll("img[data-src]");
    if ("IntersectionObserver" in window) {
      const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src;
            io.unobserve(img);
          }
        });
      });
      images.forEach((img) => io.observe(img));
    }
  }
})();

// ============ ACTIVE TOC ============
(function () {
  const tocLinks = document.querySelectorAll(".article-toc-sidebar__link");
  if (!tocLinks.length) return;

  const sections = Array.from(tocLinks)
    .map((link) => {
      const id = link.getAttribute("href");
      return document.querySelector(id);
    })
    .filter(Boolean);

  if (!sections.length) return;

  function updateActive() {
    const scrollY = window.scrollY + 120;
    let current = sections[0];

    sections.forEach((sec) => {
      if (sec.offsetTop <= scrollY) current = sec;
    });

    tocLinks.forEach((link) => {
      link.classList.remove("is-active");
      if (link.getAttribute("href") === "#" + current.id) {
        link.classList.add("is-active");
      }
    });
  }

  window.addEventListener("scroll", updateActive, { passive: true });
  updateActive();
})();
