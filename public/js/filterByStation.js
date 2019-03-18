function filterByStation () {
	
	var value = document.getElementById("filter_station").value
	window.dailyTable.columns(0)
					.search(value)
					.draw();

	window.tenTable.columns(0)
					.search(value)
					.draw();

	window.monthlyTable.columns(0)
					.search(value)
					.draw();

	window.yearlyTable.columns(0)
					.search(value)
					.draw();
}