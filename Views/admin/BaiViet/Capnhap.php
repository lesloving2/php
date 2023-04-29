<link rel="stylesheet" type="text/css" href="/php/Assets/css/Mycss.css">
<section class="site-section">
    <div class="container" id="div">
        <div class="row align-items-center mb-5">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="d-flex align-items-center">
                    <div>
                        <h2>Sửa Công Việc</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-12">
                <form class="p-4 p-md-5 border rounded" action="/php/BaiViet/Update/<?php echo $data['0']['IdBaiViet'] ?>" method="post" enctype="multipart/form-data">
                    <h3 class=" text-black mb-5 border-bottom pb-2">Chi tiết công việc</h3>
                    <div class="form-group">
                        <label for="company-name">Tên Công Ty</label>
                        <input type="text" class="form-control" id="company-name" name="Congtymoi" placeholder="Ví Dụ: Công Ty TNHH ABC" readonly>
                    </div>

                    <div class="form-group">
                        <label for="company-website-tw d-block">Upload hình nền Job</label> <br>

                        <img id="frame" alt="" width="300" height="300" /> <br> <br>
                        <label class="btn btn-primary btn-md btn-file">
                            Browse File<input type="file" onchange="ngu()" name="company_HinhNen" id="company_HinhNen">
                        </label>
                        <script>
                            function ngu() {
                                frame.src = URL.createObjectURL(event.target.files[0])
                            }
                        </script>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="you@yourdomain.com">
                    </div>
                    <div class="form-group">
                        <label for="job-title">Mô tả nghề nghiệp</label>
                        <input type="text" class="form-control" name="job-title" placeholder="Product Designer" id="job-title">
                    </div>

                    <div class="form-group">
                        <label for="job-title">Mức lương</label>
                        <input type="text" class="form-control" name="job-Luong" id="job-Luong" id="job-Luong">
                    </div>

                    <div class="form-group">
                        <label for="job-title">Số lượng</label>
                        <input type="number" class="form-control" name="job_SoLuong" placeholder="Product Designer" id="job-SoLuong">
                    </div>

                    <div class="form-group">
                        <label for="job-title">Kinh Nghiệm</label>
                        <input type="text" class="form-control" name="job_KinhNghiem" id="job-KinhNghiem">
                    </div>

                    <div class="form-group">
                        <label for="job-region">Khu vực làm việc</label>
                        <input type="text" class="form-control" name="Khuvuc" id="city">
                    </div>

                    <div class="form-group">
                        <label for="job-type">Hình thức</label>
                        <select class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type" name="job-type">
                            <option value="Part Time">Part Time</option>
                            <option value="Full Time">Full Time</option>
                            <option value="Full + Part Time">Full + Part Time</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="job-title">Hạn nộp</label>
                        <input type="date" class="form-control" id="job-deadline" name="job-deadline" placeholder="Product Designer" value="<?php echo date_create($data[0]['HanNop'])->format('Y-m-d') ?>">
                    </div>

                    <div class="form-group">
                        <label for="job-description">Mô tả công việc</label>
                        <div id="editor-2" style="height: 180px;">
                            <p>Write Job Description!</p>
                        </div>
                        <input type="hidden" name="quillMota" id="quillMota">
                    </div>
                    <div class="col-6">
                        <!--<input type="submit" class="btn btn-block btn-primary btn-md ANMbutton" value="Lưu bài viết" id="btnLuu">-->
                        <button class="ANMbutton"><span>Lưu </span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    function setBaiViet() {
        var Baiviet = <?php echo json_encode($data); ?>;
        console.log(Baiviet)
        document.getElementById('company-name').value = Baiviet[0]['TenCongTy'];
        document.getElementById('frame').src = "/php/" + Baiviet[0][Image];
        document.getElementById('email').value = Baiviet[0]['Email']
        document.getElementById('job-title').value = Baiviet[0]['ViTri']
        document.getElementById('job-Luong').value = Baiviet[0]['Luong']
        document.getElementById('job-SoLuong').value = Baiviet[0]['SoLuong']
        document.getElementById('job-KinhNghiem').value = Baiviet[0]['KinhNghiem']
        document.getElementById('city').value = Baiviet[0]['DiaChiLamViec']
    }
    setBaiViet();

    var quill;
    document.addEventListener("DOMContentLoaded", function(event) {
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],

            [{
                'header': 1
            }, {
                'header': 2
            }], // custom button values
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction

            [{
                'size': ['small', false, 'large', 'huge']
            }], // custom dropdown
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],

            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            [{
                'font': []
            }],
            [{
                'align': []
            }],

            ['clean'] // remove formatting button
        ];

        quill = new Quill('#editor-2', {
            modules: {
                toolbar: toolbarOptions,
            },
            placeholder: 'Compose an epic...',
            theme: 'snow' // or 'bubble'
        });
        var value = "<?php echo $data[0]['MoTa'] ?>"
        console.log(value)
        quill.root.innerHTML = value

        quill.on('text-change', function() {
            var delta = quill.getContents();
            var text = quill.getText();
            var justHtml = quill.root.innerHTML;
            document.getElementById('quillMota').value = justHtml;
        })
    });
</script>