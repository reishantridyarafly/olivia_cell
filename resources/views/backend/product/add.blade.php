@extends('layouts.backend.main')
@section('title', 'Tambah Produk')
@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">@yield('title')</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Produk</a></li>
                        <li class="breadcrumb-item">@yield('title')</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body lead-status">
                                <form id="form">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="photo" class="form-label">Foto <span
                                                        class="text-danger">*</span></label>
                                                <input type="file" class="form-control" id="photo" name="photo[]"
                                                    multiple>
                                                <small class="text-danger errorPhoto mt-2"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="name" class="form-label">Nama <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name">
                                                <small class="text-danger errorName mt-2"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="imei1" class="form-label">Imei 1 <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="imei1" name="imei1">
                                                <small class="text-danger errorImei1 mt-2"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="imei2" class="form-label">Imei 2</label>
                                                <input type="text" class="form-control" id="imei2" name="imei2">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="before_price" class="form-label">Harga Sebelum (Harga
                                                    Diskon)</label>
                                                <input type="text" class="form-control" id="before_price"
                                                    name="before_price">
                                                <small class="text-danger errorBeforePrice mt-2"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="after_price" class="form-label">Harga Sesudah (Harga yang akan
                                                    ditampilkan)</label>
                                                <input type="text" class="form-control" id="after_price"
                                                    name="after_price">
                                                <small class="text-danger errorAfterPrice mt-2"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="stock" class="form-label">Stok <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="stock" name="stock">
                                                <small class="text-danger errorStock mt-2"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="weight" class="form-label">Berat (Gram) <span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="weight" name="weight">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="network" class="form-label">Jaringan</label>
                                                <input type="text" class="form-control" id="network"
                                                    name="network">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="launch" class="form-label">Peluncuran</label>
                                                <input type="date" class="form-control" id="launch"
                                                    name="launch">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="dimension" class="form-label">Dimensi</label>
                                                <input type="text" class="form-control" id="dimension"
                                                    name="dimension">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="sim" class="form-label">SIM</label>
                                                <input type="text" class="form-control" id="sim"
                                                    name="sim">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="type_display" class="form-label">Tipe Layar</label>
                                                <input type="text" class="form-control" id="type_display"
                                                    name="type_display">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="resolution_display" class="form-label">Resolusi Layar</label>
                                                <input type="text" class="form-control" id="resolution_display"
                                                    name="resolution_display">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="chipset" class="form-label">Chipset</label>
                                                <input type="text" class="form-control" id="chipset"
                                                    name="chipset">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="memory" class="form-label">Memori</label>
                                                <input type="text" class="form-control" id="memory"
                                                    name="memory">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="battery" class="form-label">Baterai</label>
                                                <input type="text" class="form-control" id="battery"
                                                    name="battery">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="colors" class="form-label">Warna</label>
                                                <input type="text" class="form-control" id="colors"
                                                    name="colors">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Katalog <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" data-select2-selector="icon" name="catalog"
                                                    id="catalog">
                                                    <option value="" data-icon="feather-archive">-- Pilih Katalog --
                                                    </option>
                                                    @foreach ($catalog as $row)
                                                        <option value="{{ $row->id }}" data-icon="feather-archive">
                                                            {{ $row->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <small class="text-danger errorCatalog mt-2"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Deskripsi <span
                                                        class="text-danger">*</span></label>
                                                <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                                                <small class="text-danger errorDescription mt-2"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Deskripsi Singkat <span
                                                        class="text-danger">*</span></label>
                                                <textarea name="short_description" id="short_description" rows="3" class="form-control"></textarea>
                                                <small class="text-danger errorShortDescription mt-2"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <div class="form-group mb-3 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary"
                                                    id="save">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </main>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.10.5/autoNumeric.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/ckeditor.js"></script>

    <script>
        new AutoNumeric('#before_price', {
            currencySymbol: 'Rp ',
            decimalCharacter: ',',
            digitGroupSeparator: '.',
            decimalPlaces: 0,
        });

        new AutoNumeric('#after_price', {
            currencySymbol: 'Rp ',
            decimalCharacter: ',',
            digitGroupSeparator: '.',
            decimalPlaces: 0,
        });

        CKEDITOR.ClassicEditor.create(document.getElementById("description"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline',
                        'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'blockQuote', 'insertTable', 'mediaEmbed',
                        '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    ],
                    shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                // language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3'
                        },
                        {
                            model: 'heading4',
                            view: 'h4',
                            title: 'Heading 4',
                            class: 'ck-heading_heading4'
                        },
                        {
                            model: 'heading5',
                            view: 'h5',
                            title: 'Heading 5',
                            class: 'ck-heading_heading5'
                        },
                        {
                            model: 'heading6',
                            view: 'h6',
                            title: 'Heading 6',
                            class: 'ck-heading_heading6'
                        }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [10, 12, 14, 'default', 18, 20, 22],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [{
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [{
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                            '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                            '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                            '@sesame', '@snaps', '@soufflé',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }]
                },
                // The "super-build" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load     this site via HTTP server if you enable MathType.
                    'MathType',
                    // The following features are part of the Productivity Pack and require additional license.
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents'
                ]
            })
            .catch(error => {
                console.log(error);
            });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: new FormData(this),
                    url: "{{ route('product.store') }}",
                    type: "POST",
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function() {
                        $('#save').attr('disable', 'disabled');
                        $('#save').text('Proses...');
                    },
                    complete: function() {
                        $('#simpan').removeAttr('disable');
                        $('#save').text('Simpan');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.photo) {
                                $('#photo').addClass('is-invalid');
                                $('.errorPhoto').html(response.errors.photo);
                            } else {
                                $('#photo').removeClass('is-invalid');
                                $('.errorPhoto').html('');
                            }

                            if (response.errors.name) {
                                $('#name').addClass('is-invalid');
                                $('.errorName').html(response.errors.name);
                            } else {
                                $('#name').removeClass('is-invalid');
                                $('.errorName').html('');
                            }

                            if (response.errors.imei1) {
                                $('#imei1').addClass('is-invalid');
                                $('.errorImei1').html(response.errors.imei1);
                            } else {
                                $('#imei1').removeClass('is-invalid');
                                $('.errorImei1').html('');
                            }

                            if (response.errors.before_price) {
                                $('#before_price').addClass('is-invalid');
                                $('.errorBeforePrice').html(response.errors.before_price);
                            } else {
                                $('#before_price').removeClass('is-invalid');
                                $('.errorBeforePrice').html('');
                            }

                            if (response.errors.after_price) {
                                $('#after_price').addClass('is-invalid');
                                $('.errorAfterPrice').html(response.errors.after_price);
                            } else {
                                $('#after_price').removeClass('is-invalid');
                                $('.errorAfterPrice').html('');
                            }

                            if (response.errors.stock) {
                                $('#stock').addClass('is-invalid');
                                $('.errorStock').html(response.errors.stock);
                            } else {
                                $('#stock').removeClass('is-invalid');
                                $('.errorStock').html('');
                            }

                            if (response.errors.catalog) {
                                $('#catalog').addClass('is-invalid');
                                $('.errorCatalog').html(response.errors.catalog);
                            } else {
                                $('#catalog').removeClass('is-invalid');
                                $('.errorCatalog').html('');
                            }

                            if (response.errors.weight) {
                                $('#weight').addClass('is-invalid');
                                $('.errorWeight').html(response.errors.weight);
                            } else {
                                $('#weight').removeClass('is-invalid');
                                $('.errorWeight').html('');
                            }

                            if (response.errors.description) {
                                $('#description').addClass('is-invalid');
                                $('.errorDescription').html(response.errors.description);
                            } else {
                                $('#description').removeClass('is-invalid');
                                $('.errorDescription').html('');
                            }

                            if (response.errors.short_description) {
                                $('#short_description').addClass('is-invalid');
                                $('.errorShortDescription').html(response.errors
                                    .short_description);
                            } else {
                                $('#short_description').removeClass('is-invalid');
                                $('.errorShortDescription').html('');
                            }
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.success,
                            }).then(function() {
                                top.location.href = "{{ route('product.index') }}";
                            });
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            });
        });
    </script>
@endsection
