<!doctype html>
<html>
    <head>
        <title>{{$template->name}}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{asset('builder/assets/image/builderjs_color_logo.png')}}" rel="icon" type="image/x-icon" />
        <link rel="stylesheet" href="{{asset('builder/dist/builder.css')}}">
        <script src="{{asset('builder/dist/builder.js')}}"></script>
        <script>
            var CSRF_TOKEN = "{{ csrf_token() }}";
            var editor;
            var params = new URLSearchParams(window.location.search);
            var templates = [];
            var tags = [
                {type: 'label', tag: '{CONTACT_FIRST_NAME}'},
                {type: 'label', tag: '{CONTACT_LAST_NAME}'},
                {type: 'label', tag: '{CONTACT_FULL_NAME}'},
                {type: 'label', tag: '{CONTACT_EMAIL}'},
                {type: 'label', tag: '{CONTACT_PHONE}'},
                {type: 'label', tag: '{CONTACT_ADDRESS}'},
                {type: 'label', tag: '{ORDER_ID}'},
                {type: 'label', tag: '{ORDER_DUE}'},
                {type: 'label', tag: '{ORDER_TAX}'},
                {type: 'label', tag: '{PRODUCT_NAME}'},
                {type: 'label', tag: '{PRODUCT_PRICE}'},
                {type: 'label', tag: '{PRODUCT_QTY}'},
                {type: 'label', tag: '{PRODUCT_SKU}'},
                {type: 'label', tag: '{AGENT_NAME}'},
                {type: 'label', tag: '{AGENT_SIGNATURE}'},
                {type: 'label', tag: '{AGENT_MOBILE_PHONE}'},
                {type: 'label', tag: '{AGENT_ADDRESS}'},
                {type: 'label', tag: '{AGENT_WEBSITE}'},
                {type: 'label', tag: '{AGENT_DISCLAIMER}'},
                {type: 'label', tag: '{CURRENT_DATE}'},
                {type: 'label', tag: '{CURRENT_MONTH}'},
                {type: 'label', tag: '{CURRENT_YEAR}'},
                {type: 'button', tag: '{PERFORM_CHECKOUT}', 'text': 'Checkout'},
                {type: 'button', tag: '{PERFORM_OPTIN}', 'text': 'Subscribe'}
            ];

            $( document ).ready(function() {
                var strict = true;
                if(params.get('type') == 'custom') {
                    strict = false;
                }
                editor = new Editor({
                    strict: strict,
                    showHelp: false,
                    showInlineToolbar: false,
                    root: '{{$distUrl}}',
                    url: '{{$templateUrl}}',
                    urlBack: window.location.origin,
                    uploadAssetUrl: '{{url('templates/upload-template-assets')}}',
                    uploadAssetMethod: 'POST',
                    // uploadTemplateUrl: 'upload.php',
                    uploadTemplateCallback: function(response) {
                        window.location = response.url;
                    },
                    saveUrl: '{{url('templates/save')}}',
                    saveMethod: 'POST',
                    data: {
                        _token: CSRF_TOKEN,
                        type: 'default',
                        template_id: '{{$template->template_id}}'
                    },
                    templates: templates,
                    tags: tags,
                    changeTemplateCallback: function(url) {
                        window.location = url;
                    },
                    backgrounds: [
                        '{{asset('image/backgrounds/images1.jpg')}}',
                        '{{asset('image/backgrounds/images2.jpg')}}',
                        '{{asset('image/backgrounds/images3.jpg')}}',
                        '{{asset('image/backgrounds/images4.png')}}',
                        '{{asset('image/backgrounds/images5.jpg')}}',
                        '{{asset('image/backgrounds/images6.jpg')}}',
                        '{{asset('image/backgrounds/images9.jpg')}}',
                        '{{asset('image/backgrounds/images11.jpg')}}',
                        '{{asset('image/backgrounds/images12.jpg')}}',
                        '{{asset('image/backgrounds/images13.jpg')}}',
                        '{{asset('image/backgrounds/images14.jpg')}}',
                        '{{asset('image/backgrounds/images15.jpg')}}',
                        '{{asset('image/backgrounds/images16.jpg')}}',
                        '{{asset('image/backgrounds/images17.png')}}',
                    ],
                    customInlineEdit: function(container) {
                        var thisEditor = this;

                        var tinyconfig = {
                        skin: 'oxide-dark',
                        inline: true,
                        menubar: false,
                        force_br_newlines : false,
                        force_p_newlines : false,
                        forced_root_block : '',
                        inline_boundaries: false,
                        relative_urls: false,
                        convert_urls: false,
                        remove_script_host : false,
                        valid_elements : '*[*],meta[*]',
                        valid_children: '+h1[div],+h2[div],+h3[div],+h4[div],+h5[div],+h6[div],+a[div]',
                        plugins: 'image link lists autolink',
                        toolbar: [],
                        filemanager_title:"Responsive Filemanager" ,
                            setup: function (editor) {
                                editor.ui.registry.addMenuButton('menuDateButton', {
                                    text: getI18n('editor.insert_tag'),
                                    fetch: function (callback) {
                                        var items = [];
                                        thisEditor.tags.forEach(function(tag) {
                                            if ( tag.type == 'label') {
                                                items.push({
                                                    type: 'menuitem',
                                                    text: tag.tag.replace("{", "").replace("}", ""),
                                                    onAction: function (_) {
                                                        if (tag.text) {
                                                            editor.insertContent(tag.text);
                                                        } else {
                                                            editor.insertContent(tag.tag);
                                                        }                                            
                                                    }
                                                });
                                            }
                                        });
                                        callback(items);
                                    }
                                });
                            }
                        };
                        var unsupported_types = 'td, table, img, body';
                        if (!container.is(unsupported_types) && (container.is('[builder-inline-edit]') || !editor.strict)) {
                            container.addClass('builder-class-tinymce');
                            tinyconfig.selector = '.builder-class-tinymce';
                            editor.tinymce = $("#builder_iframe")[0].contentWindow.tinymce.init(tinyconfig);

                            container.removeClass('builder-class-tinymce');
                        }
                        if (container.is('td')) {
                            if (!container.find('.tinymce-td-fix').length) {
                                var span = $('<div class="tinymce-td-fix builder-class-tinymce">');
                                span.html(container.html());
                                container.html('');
                                container.append(span);

                                span.click();
                            }
                        }
                    },
                    loaded: function() {
                        var thisEditor = this;

                        if (typeof(WidgetManager) !== 'undefined') {
                            var widgets = WidgetManager.init();

                            widgets.forEach(function(widget) {
                                thisEditor.addContentWidget(widget, 0, 'Template Content');
                            });
                        }
                    }
                });

                editor.init();
            });
        </script>

        <style>
            .lds-dual-ring {
                display: inline-block;
                width: 80px;
                height: 80px;
            }
            .lds-dual-ring:after {
                content: " ";
                display: block;
                width: 30px;
                height: 30px;
                margin: 4px;
                border-radius: 80%;
                border: 2px solid #aaa;
                border-color: #007bff transparent #007bff transparent;
                animation: lds-dual-ring 1.2s linear infinite;
            }
            @keyframes lds-dual-ring {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(360deg);
                }
            }
        </style>
    </head>
    <body class="overflow-hidden">
        <div style="text-align: center;
            height: 100vh;
            vertical-align: middle;
            padding: auto;
            display: flex;">
            <div style="margin:auto" class="lds-dual-ring"></div>
        </div>

        <script>
            switch(window.location.protocol) {
                case 'http:':
                case 'https:':
                  //remote file over http or https
                  break;
                case 'file:':
                  alert('Please put the builderjs/ folder into your document root and open it through a web URL');
                  window.location.href = "./index.php";
                  break;
                default:
            }
        </script>
    </body>
</html>
