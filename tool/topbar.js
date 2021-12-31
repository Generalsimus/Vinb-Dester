var el = wp.element.createElement,
    registerBlockType = wp.blocks.registerBlockType;

registerBlockType('core/jsonstring', {
    title: 'JSON',
    icon: 'cloud',
    category: 'common',
    attributes: {
        content: {
            type: 'string',
            source: 'text'
        }
    },

    // edit: function () {
    //     return eljson;
    // },
    edit: function (props) {
        var updateFieldValue = function (val) {
            props.setAttributes({
                content: val
            });
        }

        return wp.element.createElement(
            wp.components.TextareaControl, {
                label: 'Dester JSON',
                placeholder: 'JSON',
                value: props.attributes.content,
                onChange: updateFieldValue,

            }
        );
    },

    save: function (props) {


        return props.attributes.content;
    },

});
















var soso = document.createElement('div')
soso.className = 'sos-post'
// var wppostersons = document.querySelector('.edit-post-visual-editor')










var set = setInterval(function () {
    if (document.querySelector('.edit-post-visual-editor')) {
        console.log(wp.data.select("core/editor").getCurrentPost().type)
        if (wp.data.select("core/editor").getCurrentPost().type !== "video") {
            clearInterval(set);
            return;
        }

        var soseg = document.createElement('div')
        soseg.innerHTML = '<div class="soso-inopt"><p>Play List 1</p><select><option  value="upload">Choose Files</option><option  value="link">Video Link</option><option  value="iframe">iFrame Code</option></select></div><div class="soso-upload-video"><div class="box">Choose Video</div><textarea rows="7" placeholder="Add Video ...."></textarea><button type="button" class="button button-large">Add Video Link</button><div></div></div>';
        soseg.setAttribute('style', 'padding: 1% 5%;')
        var conbox = soseg.querySelector('.soso-upload-video')


        var pare = document.querySelector('.editor-block-list__layout')
        pare.style.display = 'none'

        pare.parentElement.appendChild(soseg)



        var vids = document.createElement('div');
        vids.innerHTML = '<p>X</p><span class="nm"></span><span class="dashicons dashicons-arrow-down"></span>'



        optvid()



        var txtare = conbox.querySelector('textarea'),
            selct = soseg.querySelector('.soso-inopt').lastElementChild,
            bttt = conbox.querySelector('button');


        txtare.oninput = function () {

            if (txtare.value.length > 10 && selct.value == 'iframe') {
                var arrygo = getpostjson()

                delete arrygo.desterurl
                arrygo.desteriframe = txtare.value

                conbox.lastElementChild.innerHTML = ''
                setpostjson(arrygo)
            }

        }



        bttt.onclick = function () {
            if (txtare.value.length > 6) {
                var arrygo = getpostjson()

                arrygo.desterurl.push(txtare.value)


                var clon = vids.cloneNode(true)

                clon.querySelector('.nm').innerHTML = txtare.value;
                listenremove(clon, txtare.value)
                listenpr(txtare.value, clon)
                conbox.lastElementChild.appendChild(clon);




                setpostjson(arrygo)
                txtare.value=''
            }
        }



        selct.onchange = function () {
            setpostjson(getpostjson())
            txtare.setAttribute('placeholder', this.options[this.selectedIndex].innerHTML + '...')
            if (this.value == 'upload') {
                txtare.style.display = 'none'
                bttt.style.display = 'none'
                conbox.firstElementChild.style.display = 'block'
            } else {
                txtare.style.display = 'block'
                if (this.value == 'link') {
                    bttt.style.display = 'block'
                } else {
                    bttt.style.display = 'none'
                }
                conbox.firstElementChild.style.display = 'none'
            }
        }


        function getpostjson() {



            // console.log(wp.blocks.parse(wp.data.select("core/string")))

            var blok = wp.blocks.parse(wp.data.select("core/editor").getEditedPostContent())
            var arrygo = {
                desterresult: "video",
                desterurl: []
            };



            if (blok.length > 0 && blok[0].name == 'core/jsonstring' && blok[0].originalContent !== '') {
                // console.log(JSON.stringify(blok[0].attributes.content))


                var obj = JSON.parse(blok[0].originalContent);

                if (obj.desterresult && obj.desterurl) {
                    arrygo = obj
                    // console.log(blok[0].attributes.content)
                }

            }
            return arrygo;
        }


        function setpostjson(arrygo) {

            var insertedBlock = wp.blocks.createBlock('core/jsonstring', {
                content: JSON.stringify(arrygo),
            });


            wp.data.dispatch('core/editor').resetBlocks([insertedBlock]);
        }


        function listenpr(o, vids) {
            vids.querySelector('.dashicons').onclick = function () {


                if (this.nextElementSibling) {
                    this.parentElement.style.height = '35px';
                    this.parentElement.removeChild(this.nextElementSibling);
                    return;
                }
                var video = document.createElement('video')
                video.src = o
                video.controls = 'true'
                this.parentElement.appendChild(video)
                this.parentElement.style.height = '100%'

            }
        }


        function listenremove(vids, url) {
            vids.firstElementChild.onclick = function () {

                this.parentElement.parentElement.removeChild(this.parentElement);
                var arrygo = getpostjson()

                arrygo.desterurl = arrygo.desterurl.filter(function (value) {
                    return value !== url;
                });
                // console.log(arrygo)
                setpostjson(arrygo)
                // sosovalue = arrygo

            }
        }





        function optvid() {
            var arra = getpostjson();
            if (arra.desterurl) {

                [].map.call(arra.desterurl, function (o) {
                    var clon = vids.cloneNode(true),
                        nmm = o.split('/').pop();
                    clon.querySelector('.nm').innerHTML = nmm.replace('.' + nmm.split('.').pop(), "");

                    listenpr(o, clon)

                    listenremove(clon, o)
                    // console.log(conbox)
                    conbox.lastElementChild.appendChild(clon);
                });
            } else if (arra.desteriframe) {
                txtare.style.display = 'block'
                bttt.style.display = 'block'
                conbox.style.display = 'none'
                txtare.value = arra.desteriframe
            }

        }








        conbox.firstElementChild.onclick = function () {



            var arrygo = getpostjson()



            var frame = wp.media({
                title: 'Choose and Upload Videos....',
                button: {
                    text: 'Select Video'
                },
                library: {
                    type: "video"
                },
                multiple: true

            })

            frame.on('select', function () {

                var attachment = frame.state().get('selection').toJSON();

                [].map.call(attachment, function (o) {

                    var clon = vids.cloneNode(true)

                    clon.querySelector('.nm').innerHTML = o.title

                    listenremove(clon, o.url)

                    conbox.lastElementChild.appendChild(clon);
                    listenpr(o.url, clon)
                    arrygo.desterurl.push(o.url)

                    // console.log(o)
                    // console.log(arrygo)

                });


                // console.log(arrygo)
                setpostjson(arrygo)
                // sosovalue = arrygo

            });

            frame.open();


        };
        clearInterval(set)
    }
}, 100)