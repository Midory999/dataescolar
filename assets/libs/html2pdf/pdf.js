class PDF {
	fromString(content) {
		html2pdf(content)
	}

	fromElementID(id) {
		const element = document.getElementById(id)
		html2pdf(element.innerHTML)
	}

	fromElement(element) {
		html2pdf(element.innerHTML)
	}
}
