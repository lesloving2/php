<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>

</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="bigModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preview Trước</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!---- Còn js preview -->
            <?php require 'Views/XemBaiViet.php' ?>
        </div>
    </div>
</div>

<?Php if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<span style="color:blue;font-weight:bold">' . $value . '</span>';
    }
} else echo ' ' ?>



<body>
    <div>

        <section class="site-section">
            <div class="container" id="div">
                <div class="row align-items-center mb-5">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2>Thêm Công Việc</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-6">
                                <a href="#" class="btn btn-block btn-light btn-md" data-toggle="modal" data-target="#bigModal"><span class=" icon-open_in_new mr-2"></span>Preview</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <form class="p-4 p-md-5 border rounded" action="/php/BaiViet/ngu" method="post" enctype="multipart/form-data">
                            <h3 class=" text-black mb-5 border-bottom pb-2">Chi tiết công việc</h3>
                            <div class="form-group">
                                <label for="job-region">Chọn công ty đã có (nếu chưac có thì bỏ chọn)</label>
                                <select class="border rounded form-control" id="CongTy" data-style="btn-black" name="ChonCongTy" data-width="100%" data-live-search="true" onchange="changeCompany(this.value)">
                                    <option value="true" selected>Công Ty Mới</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="company-name">Tên Công Ty Mới</label>
                                <input type="text" class="form-control" id="company-name" name="Congtymoi" placeholder="Ví Dụ: Công Ty TNHH ABC" onchange="changename(this.value)">
                                <script>
                                    function changename(data) {
                                        document.getElementById('Name_CongTy').value = data.toString();
                                    }
                                </script>
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
                                <label for="job-title">Mô tả nghề nghiệp(Vị trí nghê nghiệp, tiêu đề)</label>
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
                                <select id="city" name="Khuvuc" class="border rounded form-control" data-style="btn-black" data-width="100%" title="Select Region">
                                    <option value="true" selected>Chọn tỉnh thành</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="job-type">Hình thức</label>
                                <select class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type" name="job-type">
                                    <option>Part Time</option>
                                    <option>Full Time</option>
                                    <option>Full + Part Time</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="job-title">Hạn nộp</label>
                                <input type="date" class="form-control" id="job-deadline" name="job-deadline" placeholder="Product Designer">
                            </div>

                            <div class="form-group">
                                <label for="job-description">Mô tả công việc</label>
                                <div id="editor-1" style="height: 180px;">
                                    <p>Write Job Description!</p>
                                </div>
                                <input type="hidden" name="quillMota" id="quillMota">
                            </div>

                            <h3 class="text-black my-5 border-bottom pb-2">Thông tin công ty(Tự sinh nếu đã có, Nếu chưa có thì tự điền)</h3>
                            <div class="form-group">
                                <label for="company-name">Tên Công Ty</label>
                                <input type="text" class="form-control" id="Name_CongTy" placeholder="Ví Dụ: Công Ty TNHH ABC">
                            </div>

                            <div class="form-group">
                                <label for="company-tagline">Mã số thuế</label>
                                <input type="text" class="form-control" id="MST_CongTy" name="MST_CongTy" value=" ">
                            </div>

                            <div class="form-group">
                                <label for="company-tagline">ID Công Ty(Tự cấp ID nếu chưa tồn tại)</label>
                                <input type="text" class="form-control" id="Id_CongTy" name="Id_CongTy" value=" " readonly>
                            </div>

                            <div class="form-group">
                                <label for="job-description">Thông tin thêm</label>
                                <textarea name="Mota" value=" " id="Mota" style="width: 100%; height: 150px; padding: 12px 20px; box-sizing: border-box; border: 2px solid #ccc; border-radius: 4px; background-color: #f8f8f8; font-size: 16px; resize: none;"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="company-website">Website Công Ty</label>
                                <input type="text" class="form-control" name="Web_CongTy" id="Web_CongTy" placeholder="https://" value=" ">
                            </div>

                            <div class="form-group">
                                <label for="company-website-fb">Địa Chỉ</label>
                                <input type="text" class="form-control" id="Adress_CongTy" name="Adress_CongTy" value=" ">
                            </div>

                            <div class="form-group">
                                <label for="company-website-tw d-block">Upload Logo</label> <br>
                                <img id="frame2" alt="" width="80" height="80" />
                                <label class="btn btn-primary btn-md btn-file">
                                    Browse File<input type="file" onchange="ngu2()" name="Logo_CongTy">
                                </label>
                                <script>
                                    function ngu2() {
                                        frame2.src = URL.createObjectURL(event.target.files[0])
                                    }
                                </script>
                            </div>
                            <div class="row align-items-center mb-5">
                                <div class="col-lg-4 ml-auto">
                                    <div class="row">
                                        <div class="col-6">
                                        </div>
                                        <div class="col-6">
                                            <input type="submit" class="btn btn-block btn-primary btn-md" value="Lưu bài viết" id="btnLuu">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
<script>
    let resultCongty
    var cities = document.getElementById("city");
    var CongTy = document.getElementById("CongTy");

    var Parameter = {
        url: "../Assets/js/data.json",
        method: "GET",
        responseType: "application/json",
        type: "city"
    };

    var Parameter2 = {
        url: "../company.json",
        method: "GET",
        responseType: "application/json",
        type: "company"

    };
    // const paramArr = [Parameter, Parameter2]
    // async function getData() {
    //     let result = []
    //     for (let i = 0; i < paramArr.length; i++) {
    //         const getRes = await fetch(paramArr[i].url)
    //         const data = await getRes.json()
    //         result.push({
    //             typeParam: paramArr[i].type,
    //             data: data
    //         })
    //     }
    //     return result
    // }
    // async function runAll() {
    //     try {
    //         const result1 = await getData();
    //         // console.log(result1, 'xin chao cac ban')
    //         for (let i = 0; i < result1.length; i++) {
    //             // console.log(result1[i].data, 123)

    //             if (result1[i].typeParam.toString() === 'company') {
    //                 // console.log(result1[i].data, 'result1[i].data')
    //                 // await renderCongTy(result1[i].data); // hàm lấy dữ liệu
    //                 cityData = result1[i].data
    //                 // console.log(cityData, 'cityData')
    //             }

    //             //if (result1[i].typeParam.toString() === 'company') await changeCompany(result1[i].data);
    //         }
    //     } catch (error) {
    //         console.log(error.message, 'cút')
    //     }
    // }
    // fetch(Parameter.url)
    //     .then((response) => response.json())
    //     .then((data) => {
    //         // Process the JSON data here
    //         resultCity = data;
    //         // renderCity(data)
    //     })
    //     .catch((error) => {
    //         // Handle any errors that may occur during the fetch request
    //         console.error(error);
    //     });
    async function renderCity() {
        let resultCity
        await fetch(Parameter.url)
            .then((response) => response.json())
            .then((data) => {
                // Process the JSON data here
                console.log(data, 'data')
                resultCity = data;
                for (let i = 0; i < resultCity.data.length; i++) {
                    const cityOption = document.createElement("option");
                    cityOption.value = resultCity.data[i].Name;
                    cityOption.text = resultCity.data[i].Name;
                    //fragment.appendChild(cityOption);
                    cities.appendChild(cityOption)
                }

                // renderCity(data)
            })
            .catch((error) => {
                // Handle any errors that may occur during the fetch request
                console.error(error);
            });
        //const fragment = document.createDocumentFragment();

        //await cities.appendChild(fragment)
    }
    async function renderCongTy(data) {
        // await fetch('Parameter2.url')
        // await fetch('../djtme.json')
        await fetch('../company.json')

            .then((response) => response.json())
            .then((data2) => {
                // Process the JSON data here
                resultCongty = data2;
                //console.log(resultCongty, compan')
                console.log(resultCongty.length)
                for (let i = 0; i < resultCongty.length; i++) {
                    const CongTyOption = document.createElement("option");
                    // console.log(resultCongty[i]['IdCongTy'])
                    CongTyOption.value = resultCongty[i]['IdCongTy'];
                    CongTyOption.text = resultCongty[i]['TenCongTy'];
                    //fragment.appendChild(CongTyOption);
                    CongTy.appendChild(CongTyOption)
                }
                // alert(resultCongty, 'resultCongty')
                // console.log(data2, 'đây là data');
                // renderCongTy(data2);
            })
            .catch((error) => {
                // Handle any errors that may occur during the fetch request
                console.error(error);
            });
        //const fragment = document.createDocumentFragment();


        //await CongTy.appendChild(fragment);
    }
    // fetch(Parameter2.url)
    //     .then((response) => response.json())
    //     .then((data2) => {
    //         // Process the JSON data here
    //         resultCongty = data2;
    //         // console.log(data2, 'đây là data');
    //         // renderCongTy(data2);
    //     })
    //     .catch((error) => {
    //         // Handle any errors that may occur during the fetch request
    //         console.error(error);
    //     });

    renderCity()
    renderCongTy()

    function changeCompany(data) {

        //reslut1 đang là 1 mảng của jsson r
        if (data == 'true') {
            document.getElementById('company-name').value = ''
            document.getElementById('Name_CongTy').value = ''
            document.getElementById('MST_CongTy').value = ''
            document.getElementById('Id_CongTy').value = ''
            Mota('')
            document.getElementById('Web_CongTy').value = ''
            document.getElementById('Adress_CongTy').value = ''
            document.getElementById('frame2').src = null
            document.getElementById('company-name').readOnly = false;
            document.getElementById('Name_CongTy').readOnly = false
            document.getElementById('MST_CongTy').readOnly = false
            document.getElementById('Web_CongTy').readOnly = false
            document.getElementById('frame2').readOnly = false
            document.getElementById('Mota').readOnly = false
            document.getElementById('Adress_CongTy').readOnly = false
        } else {
            const newData = resultCongty.filter(n => n.IdCongTy.toString() === data.toString())
            const newResult = newData[0]
            document.getElementById('company-name').value = newResult['TenCongTy'].toString()
            document.getElementById('Name_CongTy').value = newResult['TenCongTy'].toString()
            document.getElementById('MST_CongTy').value = newResult['MSThue'].toString()
            document.getElementById('Id_CongTy').value = newResult['IdCongTy'].toString()
            Mota(newResult['MoTa'].toString())
            document.getElementById('Web_CongTy').value = newResult['Website'].toString()
            document.getElementById('Adress_CongTy').value = newResult['DiaChi'].toString()
            document.getElementById('frame2').src = "/php/" + newResult['Logo'].toString()
            document.getElementById('company-name').readOnly = true;
            document.getElementById('Name_CongTy').readOnly = true;
            document.getElementById('MST_CongTy').readOnly = true;
            document.getElementById('Web_CongTy').readOnly = true;
            document.getElementById('frame2').readOnly = true;
            document.getElementById('Adress_CongTy').readOnly = true;
        }

    }

    function Mota(data) {
        document.getElementById('Mota').innerHTML = data
        document.getElementById('Mota').readOnly = true;
    }
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

        quill = new Quill('#editor-1', {
            modules: {
                toolbar: toolbarOptions,
            },
            placeholder: 'Compose an epic...',
            theme: 'snow' // or 'bubble'
        });

        quill.on('text-change', function() {
            var delta = quill.getContents();
            var text = quill.getText();
            var justHtml = quill.root.innerHTML;
            document.getElementById('quillMota').value = justHtml;
        })
    });

    function updateContent() {
        var element = document.getElementById("culon");
    }
    updateContent();
    // 1 loz function
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function hienthi() {

        //Chi tiết công việc
        let q = document.getElementById('company-name').value //Phải có
        let w = document.getElementById('email').value //Phải có phải là đuôi Email @
        let e = document.getElementById('job-title').value //Phải có           
        let t = document.getElementById('job-SoLuong').value //phải có default là nhập int r
        let y = document.getElementById('job-Luong').value //phải có
        let u = document.getElementById('job-KinhNghiem').value //phải có
        let i = document.getElementById('job-deadline').value //phải có
        let o = document.getElementById('city').value //Không cần cx đc
        let p = document.getElementById('job-type').value //phải có
        let a = document.getElementById('quillMota').value //ko cần cx đc
        //Thông tin công ty
        let s = document.getElementById('Name_CongTy').value //nhập comany name thì sẽ tự động điền cái này nên ko cần cx đc
        let d = document.getElementById('MST_CongTy').value //phải có và là duy nhất
        let f = document.getElementById('Id_CongTy').value // cái này TỰ ĐỘNG ĐIỀN ko nên động
        let g = document.getElementById('Mota').innerHTML //ko cần cx đc
        let h = document.getElementById('Web_CongTy').value //ko cần cx đc
        let j = document.getElementById('Adress_CongTy').value //ko cần cx đc
        let k = document.getElementById('frame2').src //ảnh logo công ty ko cần cx đc

        //log 1 đống biến ở trên là ra d
        console.log(q);
        console.log(w);

        return 0

        //Ấn vào preview ở trên là ra nhé 
    }
    document.getElementById("btnLuu").addEventListener("click", function(event) {
        //Nếu hàm hienthi() return 1 thì không thực hiện nút Lưu bài viết :)
        if (hienthi() == 1) {
            alert('Không đạt điều kiện')
            event.preventDefault()
        }
    });
</script>


</body>