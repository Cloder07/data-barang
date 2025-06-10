let dataBarang = [];
let nomor = 1;

document.getElementById('formBarang').addEventListener('submit', function(e) {
  e.preventDefault();

  const nama = document.getElementById('nama').value;
  const jumlah = document.getElementById('jumlah').value;
  const kategori = document.getElementById('kategori').value;

  dataBarang.push({ nama, jumlah, kategori });
  tampilkanData();
  this.reset();
});

function tampilkanData() {
  const tbody = document.querySelector('#tabelBarang tbody');
  tbody.innerHTML = '';

  dataBarang.forEach((item, index) => {
    const tr = document.createElement('tr');
    tr.innerHTML = 
      <td>${index + 1}</td>
      <td>${item.nama}</td>
      <td>${item.jumlah}</td>
      <td>${item.kategori}</td>
    ;
    tbody.appendChild(tr);
  });
}