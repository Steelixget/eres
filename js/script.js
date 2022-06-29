const placePainting = document.querySelector('.frame_content')
const buttPaintLine = document.querySelector('#paint_butt')
const buttPaintFigure = document.querySelector('#figure_butt')

buttPaintLine.addEventListener('click', () => {

	placePainting.classList.toggle("active_Paint")
	let yMove
	let xMove
	// console.log(rotateMouse)



	placePainting.addEventListener('mousedown', (ePlace) => {
		const newLine = document.createElement('div')
		const cordPlacePainting = placePainting.getBoundingClientRect()
		const ePlaceX = ePlace.offsetX
		const ePlaceY = ePlace.offsetY


		const rotateMouse = placePainting.addEventListener('mousemove', (e) => {
			// console.log(e)
			xMove = e.offsetX
			newLine.style.cssText = `width: ${xMove}px; height: 10px; background-color: #f599; position: absolute; top:${ePlaceY}px; left:${ePlaceX}px;  transform: rotate(${0}deg);`


		})


		console.log(xMove)



		// console.log(ePlace)

		placePainting.appendChild(newLine)

	}
	)


})
