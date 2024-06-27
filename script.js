document.addEventListener('DOMContentLoaded', () => {
  const entryForm = document.getElementById('entryForm');
  const dataTableBody = document.querySelector('#dataTable tbody');
  const grandTotalCell = document.getElementById('grandTotal');

  entryForm.addEventListener('submit', (event) => {
      const espressoInput = entryForm.querySelector('input[name="espresso"]');
      const latteInput = entryForm.querySelector('input[name="latte"]');
      const totalInput = entryForm.querySelector('input[name="total"]');
      totalInput.value = parseFloat(espressoInput.value) + parseFloat(latteInput.value);
  });

  document.getElementById('endMonthButton').addEventListener('click', () => {
      window.location.href = 'generate_pdf.php';
  });

  fetch('process.php?action=get_entries')
      .then(response => response.json())
      .then(data => {
          let grandTotal = 0;
          data.forEach(entry => {
              const row = dataTableBody.insertRow();
              row.insertCell(0).textContent = entry.entry_date;
              row.insertCell(1).textContent = entry.espresso;
              row.insertCell(2).textContent = entry.latte;
              row.insertCell(3).textContent = entry.total;
              row.insertCell(4).textContent = entry.comments;
              grandTotal += parseFloat(entry.total);
          });
          grandTotalCell.textContent = grandTotal;
      });
});
