// Listen for the "Print" button click event
document.getElementById("print-btn").addEventListener("click", function() {
	// Create a new jsPDF instance
	var doc = new jsPDF();
	
	// Select the table and get its HTML content
	var table = document.querySelector("table");
	var html = table.outerHTML;
	
	// Convert the HTML content to PDF using jsPDF
	doc.fromHTML(html);
	
	// Open the PDF in a new window or tab
	var pdfUrl = doc.output("datauristring");
	window.open(pdfUrl);
	
	// Print the PDF file
	setTimeout(function() {
		window.print();
	}, 1000);
});
