let cart = [];
 let total = 0;
 let memberDiscountRate = 0;
 // Load saved data when page loads
 window.onload = function() {
     loadSavedData();
 }
 function loadSavedData() {
     // Load member data
     const savedMemberId = localStorage.getItem('memberId');
     const savedMemberName = localStorage.getItem('memberName');
     const savedMemberDiscount = localStorage.getItem('memberDiscountRate');
     if (savedMemberId) {
         document.getElementById('memberId').value = savedMemberId;
         document.getElementById('memberName').textContent = savedMemberName;
         memberDiscountRate = parseFloat(savedMemberDiscount);
         document.getElementById('memberDiscount').textContent = `${memberDiscountRate}%`;
     }
     // Load cart items
     const savedCart = localStorage.getItem('cartItems');
     if (savedCart) {
         const cartItems = JSON.parse(savedCart);
         document.getElementById('cart-items').innerHTML = ''; // Clear default empty row
         
         cartItems.forEach(item => {
             const newRow = document.createElement('tr');
             newRow.className = 'transition-all hover:bg-gray-50';
             newRow.innerHTML = `
                 <td class="text-center px-6 py-3 text-gray-700 flex justify-center">
                     <input type="number" onchange="fetchBarang(this)" class="kode-barang block w-20 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" value="${item.kodeBarang}">
                 </td>
                 <td class="text-center px-6 py-3 text-gray-700 nama-barang">${item.namaBarang}</td>
                 <td class="text-center px-6 py-3 text-gray-700 harga">Rp ${item.harga}</td>
                 <td class="text-center px-6 py-3 text-gray-700 flex justify-center">
                     <input type="number" onchange="calculateSubtotal(this)" class="jumlah block w-20 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" value="${item.jumlah}">
                 </td>
                 <td class="text-center px-6 py-3 text-gray-700 subtotal">Rp ${item.subtotal}</td>
                 <td class="text-center px-6 py-3">
                     <button onclick="deleteRow(this)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                         Hapus
                     </button>
                 </td>
             `;
             document.getElementById('cart-items').appendChild(newRow);
         });
         addEmptyRow();
         updateTotal();
         updateTotalItems();
     }
 }
 function saveCartData() {
     const rows = document.querySelectorAll('#cart-items tr');
     const cartItems = [];
     rows.forEach(row => {
         const kodeBarang = row.querySelector('.kode-barang')?.value;
         const namaBarang = row.querySelector('.nama-barang')?.textContent;
         const harga = row.querySelector('.harga')?.textContent?.replace('Rp ', '');
         const jumlah = row.querySelector('.jumlah')?.value;
         const subtotal = row.querySelector('.subtotal')?.textContent?.replace('Rp ', '');
         if (kodeBarang && namaBarang && harga && jumlah && subtotal) {
             cartItems.push({
                 kodeBarang,
                 namaBarang,
                 harga,
                 jumlah,
                 subtotal
             });
         }
     });
     localStorage.setItem('cartItems', JSON.stringify(cartItems));
     console.log('Cart items saved:', cartItems);
 }
 addEmptyRow();
 function addEmptyRow() {
     const cartItems = document.getElementById('cart-items');
     const newRow = document.createElement('tr');
     newRow.className = 'transition-all hover:bg-gray-50';
     newRow.innerHTML = `
     <td class="text-center px-6 py-3 text-gray-700 flex justify-center">
         <input type="number" onchange="fetchBarang(this)" class="kode-barang block w-20 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
     </td>
     <td class="text-center px-6 py-3 text-gray-700 nama-barang"></td>
     <td class="text-center px-6 py-3 text-gray-700 harga"></td>
     <td class="text-center px-6 py-3 text-gray-700 flex justify-center">
         <input type="number" onchange="calculateSubtotal(this)" class="jumlah block w-20 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
     </td>
     <td class="text-center px-6 py-3 text-gray-700 subtotal"></td>
     <td class="text-center px-6 py-3">
         <button onclick="deleteRow(this)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
             Hapus
         </button>
     </td>
 `;
     cartItems.appendChild(newRow);
 }
 function deleteRow(button) { // menghapus baris 
     const row = button.closest('tr');
     const subtotalElement = row.querySelector('.subtotal');
     if (subtotalElement.textContent) {
         const subtotal = parseInt(subtotalElement.textContent.replace('Rp ', ''));
         total -= subtotal;
         document.getElementById('total').textContent = `Rp ${total}`;
     }
     row.remove();
     // Add new row if table is empty
     const allRows = document.querySelectorAll('#cart-items tr');
     if (allRows.length === 0) {
         addEmptyRow();
     }
     // Save cart data
     saveCartData();
 }
 // Tambahkan fungsi untuk menampilkan dan menutup modal
 function showModal(message, isSuccess = false) {
     document.getElementById('modal-message').textContent = message;
     document.getElementById('modal-icon-warning').classList.toggle('hidden', isSuccess);
     document.getElementById('modal-icon-success').classList.toggle('hidden', !isSuccess);
     document.getElementById('alert-modal').classList.remove('hidden');
 }
 function closeModal() {
     document.getElementById('alert-modal').classList.add('hidden');
 }
 async function fetchBarang(input) {
     const row = input.closest('tr');
     const id = input.value;
     // Reset nilai-nilai di row
     row.querySelector('.nama-barang').textContent = '';
     row.querySelector('.harga').textContent = '';
     row.querySelector('.jumlah').value = '';
     row.querySelector('.subtotal').textContent = '';
     if (!id) {
         row.querySelector('.nama-barang').textContent = 'Masukkan kode barang';
         row.querySelector('.nama-barang').classList.add('text-red-500');
         return;
     }
     try {
         const response = await fetch(`/get-barang/${id}`);
         const data = await response.json();
         
         if (data.error) {
             row.querySelector('.nama-barang').textContent = 'Barang tidak ditemukan';
             row.querySelector('.nama-barang').classList.add('text-red-500');
             input.value = '';
             return;
         }
         if (data.Stok <= 0) {
             row.querySelector('.nama-barang').textContent = 'Stok produk habis';
             row.querySelector('.nama-barang').classList.add('text-red-500');
             input.value = '';
             return;
         }
         // Jika data ditemukan dan stok tersedia
         row.querySelector('.nama-barang').textContent = data.NamaProduk;
         row.querySelector('.nama-barang').classList.remove('text-red-500');
         row.querySelector('.harga').textContent = `Rp ${data.Harga}`;
         row.querySelector('.jumlah').value = '1';
         row.querySelector('.subtotal').textContent = `Rp ${data.Harga}`;
         // Update total
         updateTotal();
         updateTotalItems();
         // Simpan data cart setelah menambah item baru
         saveCartData();
         // Tambahkan baris baru jika ini baris terakhir
         if (row === document.querySelector('#cart-items tr:last-child')) {
             addEmptyRow();
         }
     } catch (error) {
         row.querySelector('.nama-barang').textContent = 'Barang tidak ditemukan';
         row.querySelector('.nama-barang').classList.add('text-red-500');
         input.value = '';
         row.querySelector('.harga').textContent = '';
         row.querySelector('.jumlah').value = '';
         row.querySelector('.subtotal').textContent = '';
     }
 }
 async function calculateSubtotal(input) {
     const row = input.closest('tr');
     const kodeBarang = row.querySelector('.kode-barang').value;
     const jumlah = parseInt(input.value);
     // Add validation for zero quantity
     if (jumlah <= 0) {
         showModal('Jumlah barang tidak boleh 0 atau negatif', false);
         input.value = '';
         row.querySelector('.subtotal').textContent = '';
         return;
     }
     try {
         // Fetch current stock data
         const response = await fetch(`/get-barang/${kodeBarang}`);
         const data = await response.json();
         
         if (jumlah > data.Stok) {
             showModal(`Stok tidak cukup. Stok tersedia: ${data.Stok}`, false);
             input.value = '';
             row.querySelector('.subtotal').textContent = '';
             return;
         }
         const harga = parseInt(row.querySelector('.harga').textContent.replace('Rp ', ''));
         const subtotal = harga * jumlah;
         row.querySelector('.subtotal').textContent = `Rp ${subtotal}`;
         // Add new row if this is the last row
         const allRows = document.querySelectorAll('#cart-items tr');
         if (row === allRows[allRows.length - 1]) {
             addEmptyRow();
         }
         updateTotal();
         updateTotalItems();
         
         // Simpan data cart setelah mengubah jumlah
         saveCartData();
     } catch (error) {
         showModal('Terjadi kesalahan saat memeriksa stok', false);
         input.value = '';
         row.querySelector('.subtotal').textContent = '';
     }
 }
 function updateTotal() {
     const subtotal = calculateTotal();
     document.getElementById('subtotal').textContent = `Rp ${subtotal}`;
     
     // Hitung diskon
     const discount = subtotal * (memberDiscountRate / 100);
     const finalTotal = subtotal - discount;
     
     // Update tampilan
     document.getElementById('total').textContent = `Rp ${finalTotal}`;
 }
 function updateTotalItems() {
     const inputs = document.querySelectorAll('.jumlah');
     let totalItems = 0;
     inputs.forEach(input => {
         if (input.value) {
             totalItems += parseInt(input.value);
         }
     });
     document.getElementById('totalItems').textContent = totalItems;
 }
 function applyDiscount() {
     const subtotal = calculateTotal();
     const discount = subtotal * (memberDiscountRate / 100);
     const finalTotal = subtotal - discount;
     document.getElementById('memberDiscount').textContent = `${memberDiscountRate}%`;
     document.getElementById('total').textContent = `Rp ${finalTotal}`;
 }
 // Function to complete the transaction
 async function finishTransaction() {
     const items = [];
     const rows = document.querySelectorAll('#cart-items tr');
     
     for (const row of rows) {
         const kodeBarang = row.querySelector('.kode-barang')?.value;
         const jumlah = row.querySelector('.jumlah')?.value;
         const subtotalEl = row.querySelector('.subtotal')?.textContent;
         
         if (kodeBarang && jumlah && subtotalEl) {
             items.push({
                 produkId: parseInt(kodeBarang),
                 jumlah: parseInt(jumlah),
                 subtotal: parseInt(subtotalEl.replace('Rp ', ''))
             });
         }
     }
     if (items.length === 0) {
         showModal('Tidak ada item dalam transaksi!', false);
         return;
     }
     const subtotal = calculateTotal();
     const pelangganId = document.getElementById('memberId')?.value;
     try {
         const response = await fetch('/simpan-transaksi', {
             method: 'POST',
             headers: {
                 'Content-Type': 'application/json',
                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
             },
             body: JSON.stringify({
                 items: items,
                 totalHarga: subtotal,
                 discountRate: memberDiscountRate,
                 pelangganId: pelangganId || null
             })
         });
         const result = await response.json();
         
         if (result.success) {
             const printDiv = document.createElement('div');
             printDiv.id = 'printArea';
             
             const printStyle = document.createElement('style');
             printStyle.textContent = `
                 @media print {
                     body * {
                         visibility: hidden;
                     }
                     #printArea, #printArea * {
                         visibility: visible;
                     }
                     #printArea {
                         position: absolute;
                         left: 0;
                         top: 0;
                         padding: 1cm;
                         font-family: monospace;
                         font-size: 12px;
                         line-height: 1.5;
                         width: 80mm;
                         min-height: 100vh;
                         box-sizing: border-box;
                         display: flex;
                         flex-direction: column;
                     }
                     @page {
                         size: 80mm 297mm;
                         margin: 0;
                     }
                 }
             `;
             
             const dashedLine = '='.repeat(42);
             const currentDate = new Date().toLocaleString('id-ID');
             const discount = subtotal * (memberDiscountRate / 100);
             const finalTotal = subtotal - discount;
             
             const strukContent = `
                 <pre>
${dashedLine}
            TOKO BANGUNAN
         Jl. Raya Utama No. 123
          Telp. (021) 555-1234
${dashedLine}

Tanggal    : ${currentDate}
No. Nota   : ${result.noNota}
${pelangganId ? `No. Member  : ${pelangganId}` : ''}
${document.getElementById('memberName').textContent ? `Nama Member : ${document.getElementById('memberName').textContent}` : ''}
${dashedLine}
No  Nama Barang            Qty    Total
${dashedLine}
${Array.from(rows).map((row, index) => {
    if (row.querySelector('.nama-barang')?.textContent) {
        const no = String(index + 1).padStart(2);
        const nama = row.querySelector('.nama-barang').textContent.substring(0, 20).padEnd(20);
        const qty = row.querySelector('.jumlah').value.padStart(3);
        const total = 'Rp ' + new Intl.NumberFormat('id-ID').format(parseInt(row.querySelector('.subtotal').textContent.replace('Rp ', ''))).padStart(10);
        return `${no}  ${nama} ${qty}  ${total}`;
    }
    return '';
}).filter(Boolean).join('\n')}
${dashedLine}

RINGKASAN PEMBAYARAN
-------------------
Total Item  : ${document.getElementById('totalItems').textContent.padStart(6)} pcs
Subtotal    : ${('Rp ' + new Intl.NumberFormat('id-ID').format(subtotal)).padStart(15)}
${memberDiscountRate > 0 ? `Disc Member : ${('Rp ' + new Intl.NumberFormat('id-ID').format(discount)).padStart(15)}\n` : ''}
${dashedLine}
TOTAL BAYAR : ${('Rp ' + new Intl.NumberFormat('id-ID').format(finalTotal)).padStart(15)}
${dashedLine}

           Terima Kasih
        Atas Kunjungan Anda

* Barang yang sudah dibeli tidak
  dapat dikembalikan
* Simpan struk ini sebagai bukti
  pembayaran yang sah

${dashedLine}
        www.tokobangunan.com
        info@tokobangunan.com
${dashedLine}
</pre>`;
             
             printDiv.innerHTML = printStyle.outerHTML + strukContent;
             document.body.appendChild(printDiv);
             
             window.print();
             
             document.body.removeChild(printDiv);
             
             // Reset form and localStorage after printing
             document.getElementById('cart-items').innerHTML = '';
             document.getElementById('memberId').value = '';
             document.getElementById('memberName').textContent = '';
             document.getElementById('memberDiscount').textContent = '0%';
             document.getElementById('total').textContent = 'Rp 0';
             document.getElementById('totalItems').textContent = '0';
             document.getElementById('subtotal').textContent = 'Rp 0';
             memberDiscountRate = 0;
             
             addEmptyRow();
             
             // Clear localStorage
             localStorage.removeItem('cartItems');
             localStorage.removeItem('memberId');
             localStorage.removeItem('memberName');
             localStorage.removeItem('memberDiscountRate');
             
             showModal('Transaksi berhasil disimpan', true);
         } else {
             showModal('Gagal menyimpan transaksi: ' + result.message, false);
         }
     } catch (error) {
         showModal('Terjadi kesalahan: ' + error.message, false);
     }
 }
 async function checkMember(input) {
     const id = input.value;
     const memberNameElement = document.getElementById('memberName');
     
     try {
         const response = await fetch(`/get-member/${id}`);
         const data = await response.json();
         
         if (data.error) {
             memberDiscountRate = 0;
             document.getElementById('memberDiscount').textContent = '0%';
             memberNameElement.textContent = ''; // Kosongkan nama member
             showModal('Member tidak ditemukan', false);
         } else {
             memberDiscountRate = data.discount;
             document.getElementById('memberDiscount').textContent = `${data.discount}%`;
             memberNameElement.textContent = data.nama; // Tampilkan nama member
             
             // Panggil updateTotal untuk menghitung ulang total dengan diskon
             updateTotal();
             
             // Save member data
             localStorage.setItem('memberId', id);
             localStorage.setItem('memberName', data.nama);
             localStorage.setItem('memberDiscountRate', data.discount);
         }
     } catch (error) {
         memberDiscountRate = 0;
         document.getElementById('memberDiscount').textContent = '0%';
         memberNameElement.textContent = ''; // Kosongkan nama member
         showModal('Terjadi kesalahan', false);
     }
 }
 function calculateTotal() {
     const subtotals = document.querySelectorAll('.subtotal');
     let total = 0;
     subtotals.forEach(sub => {
         if (sub.textContent) {
             total += parseInt(sub.textContent.replace('Rp ', ''));
         }
     });
     return total;
 }
 function emptyCart() { //fungsi untunk mengosongkan keranjang
     if (confirm('Apakah Anda yakin ingin mengosongkan keranjang?')) {
         // Hapus semua baris di keranjang
         document.getElementById('cart-items').innerHTML = '';
         
         // Reset semua total
         document.getElementById('totalItems').textContent = '0';
         document.getElementById('subtotal').textContent = 'Rp 0';
         document.getElementById('total').textContent = 'Rp 0';
         
         // Reset member discount jika ada
         document.getElementById('memberDiscount').textContent = '0%';
         memberDiscountRate = 0;
         
         // Tambahkan baris kosong baru
         addEmptyRow();
         
         // Clear localStorage
         localStorage.removeItem('cartItems');
         localStorage.removeItem('memberId');
         localStorage.removeItem('memberName');
         localStorage.removeItem('memberDiscountRate');
         showModal('Keranjang berhasil dikosongkan', true);
     }
 }