const applyStyles = iframe => {
	let styles = {
		fontColor : "#333",
		backgroundColor : "rgba(149,91,69,255)",
		fontGoogleName : "Sofia",
		fontSize : "20px",
		hideIcons : false ,
		inputBackgroundColor : "gray",
		inputFontColor : "blue",
		height : "700px",
		memberListFontColor : "#ff00dd",
		memberListBackgroundColor : "white"
	}
	
	setTimeout(() => {
		iframe.contentWindow.postMessage(JSON.stringify(styles), "*");	
}, 100);
}
