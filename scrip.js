document.addEventListener('DOMContentLoaded', () => {
  const entryForm = document.getElementById('entryForm');
  const dataTableBody = document.querySelector('#dataTable tbody');
  const grandTotalCell = document.getElementById('grandTotal');
  const espressoTotalCell = document.createElement('td');
  const latteTotalCell = document.createElement('td');
  let grandTotal = 0;
  let espressoTotal = 0;
  let latteTotal = 0;

  const updateTotals = () => {
      grandTotalCell.textContent = grandTotal;
      espressoTotalCell.textContent = espressoTotal;
      latteTotalCell.textContent = latteTotal;
  };

  entryForm.addEventListener('submit', (event) => {
      const espressoInput = entryForm.querySelector('input[name="espresso"]');
      const latteInput = entryForm.querySelector('input[name="latte"]');
      const totalInput = entryForm.querySelector('input[name="total"]');

      const espressoValue = parseFloat(espressoInput.value);
      const latteValue = parseFloat(latteInput.value);
      const totalValue = espressoValue + latteValue;

      totalInput.value = totalValue;

      grandTotal += totalValue;
      espressoTotal += espressoValue;
      latteTotal += latteValue;

      const newRow = dataTableBody.insertRow();
      newRow.insertCell(0).textContent = entryForm.querySelector('input[name="entry_date"]').value;
      newRow.insertCell(1).textContent = espressoValue;
      newRow.insertCell(2).textContent = latteValue;
      newRow.insertCell(3).textContent = totalValue;
      newRow.insertCell(4).textContent = entryForm.querySelector('textarea[name="comments"]').value;

      updateTotals();
  });

  document.getElementById('endMonthButton').addEventListener('click', () => {
      window.location.href = 'generate_pdf.php';
  });

  fetch('process.php?action=get_entries')
      .then(response => response.json())
      .then(data => {
          data.forEach(entry => {
              const row = dataTableBody.insertRow();
              row.insertCell(0).textContent = entry.entry_date;
              row.insertCell(1).textContent = entry.espresso;
              row.insertCell(2).textContent = entry.latte;
              row.insertCell(3).textContent = entry.total;
              row.insertCell(4).textContent = entry.comments;

              grandTotal += parseFloat(entry.total);
              espressoTotal += parseFloat(entry.espresso);
              latteTotal += parseFloat(entry.latte);
          });
          updateTotals();
      });

  const tfootRow = document.querySelector('#dataTable tfoot tr:nth-child(2)');
  tfootRow.insertBefore(espressoTotalCell, grandTotalCell);
  tfootRow.insertBefore(latteTotalCell, grandTotalCell);
});
