// Dapatkan semua item nav
const navItems = document.querySelectorAll('.nav-item');

// Tambahkan event listener ke setiap item nav
navItems.forEach((item) => {
  item.addEventListener('click', (e) => {
    // Hapus kelas aktif dari semua item nav
    navItems.forEach((navItem) => navItem.classList.remove('active'));

    // Tambahkan kelas aktif ke item nav yang diklik
    item.classList.add('active');
  });
});