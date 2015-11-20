function ponFecha()
	 {
		d = new Date()
		dateText = ""
		pato=""
		dateText=d.getDate();

		monthValue = d.getMonth()
		dateText += " "
		if (monthValue == 0)
			dateText += "de enero"
		if (monthValue == 1)
			dateText += "de febrero"
		if (monthValue == 2)
			dateText += "de marzo"
		if (monthValue == 3)
			dateText += "de abril"
		if (monthValue == 4)
			dateText += "de mayo"
		if (monthValue == 5)
			dateText += "de junio"
		if (monthValue == 6)
			dateText += "de julio"
		if (monthValue == 7)
			dateText += "de agosto"
		if (monthValue == 8)
			dateText += "de septiembre"
		if (monthValue == 9)
			dateText += "de octubre"
		if (monthValue == 10)
			dateText += "de noviembre"
		if (monthValue == 11)
			dateText += "de diciembre"
		
		if (d.getYear() < 2000)
			dateText += " de " + (1900 + d.getYear())
		else
			dateText += " de " + (d.getYear())
		
	//	document.write(dateText)
	document.getElementById('scriptFecha').innerHTML = dateText;
  }

$(function() {
	ponFecha();
})