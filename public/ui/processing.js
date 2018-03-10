
    function ShowLoading(e) {
        var div = document.createElement('div');
        var img = document.createElement('img');
        img.src = '../../img/810.gif';
        div.innerHTML = "Processing...<br />";
        div.style.cssText = 'position: fixed; top: 20%; left: 30%; z-index: 5000; width: 422px; text-align: center; color:#FFF';

        div.appendChild(img);
        document.body.appendChild(div);
        return true;
        // These 2 lines cancel form submission, so only use if needed.
        //window.event.cancelBubble = true;
        //e.stopPropagation();
    }
