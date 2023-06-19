var pieElement = document.getElementById('pie');

// Fungsi untuk memperbarui nilai ketinggian dan memperbarui pie
function updatePieHeight() {
  // Mengirim permintaan Ajax ke server untuk mendapatkan data ketinggian terbaru
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'api/ketinggian', true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      var data = JSON.parse(xhr.responseText);
      var height = parseFloat(data.height); // Mengambil nilai ketinggian dari data yang diperoleh
      var percentage = height; // Menggunakan nilai ketinggian sebagai persentase (misalnya jika dalam cm)

      // Mengatur nilai variabel CSS --p sesuai dengan persentase ketinggian
      pieElement.style.setProperty('--p', percentage);
    }
  };
  xhr.send();
}

// Memanggil fungsi updatePieHeight saat halaman dimuat
updatePieHeight();

// Memperbarui pie secara berkala (misalnya setiap 5 detik)
setInterval(updatePieHeight, 5000);
