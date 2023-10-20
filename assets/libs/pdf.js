class PDF {
	fromString(content) {
		html2pdf(content)
	}

	fromElementID(id) {
		const element = document.getElementById(elementid)
		html2pdf(element.innerHTML)
	}

	fromElement(element) {
		html2pdf(element.innerHTML)
	}
}
