var page = require('webpage').create(),
    system = require('system'),
    address, output, size;


address = system.args[1];
output = system.args[2];

size = system.args[3].split('x');
page.paperSize = { width: size[0], height: size[1], margin: '0px' };

page.zoomFactor = 0.40;
page.open(address, function (status) {
    if (status !== 'success') {
        console.log('Unable to load the address!');
        phantom.exit();
    } else {
        window.setTimeout(function () {
            page.render(output, {quality: '100'});
            phantom.exit();
        }, 300);
    }
});
