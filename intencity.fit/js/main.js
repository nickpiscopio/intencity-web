/**
 *	Sets the listener hovering over a button.
 *
 * identifier	The button to add the listener to.
 * imageName	The nae of the image to switch to.
 */
function setChangeImageListener(identifier, imageName)
{
	$(identifier + " img").hover(function() { 
            this.src = "images/" + imageName + "_hover.svg";
        }, function () {
	        this.src = "images/" + imageName + ".svg";
	    });

	$(identifier + " img").click(function() {
	        this.src = "images/" + imageName + ".svg";
	    });
}