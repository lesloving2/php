<div>
    <button id="123123">button show array</button>
    <select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm" onchange="cityChange(event)">
        <option value="" selected>Chọn tỉnh thành</option>
    </select>

    <select class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
        <option value="" selected>Chọn quận huyện</option>
    </select>

    <select class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">
        <option value="" selected>Chọn phường xã</option>
    </select>
</div>
<script>
    let result123 = []
    var cities = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "../Assets/js/data.json",
        method: "GET",
        responseType: "application/json",
    };
    fetch(Parameter.url)
        .then((response) => response.json())
        .then((data) => {
            // Process the JSON data here
            result123 = data;
            console.log(result123, 'đây còn j');
            renderCity(result123)

        })
        .catch((error) => {
            // Handle any errors that may occur during the fetch request
            console.error(error);
        });
    // console.log('arr', result123)

    let citiesName
    let districtsName
    let wardsName


    function renderCity(data) {
        for (let i = 0; i < data.data.length; i++) {
            const cityOption = document.createElement("option");
            cityOption.value = data.data[i].Name;
            cityOption.text = data.data[i].Name;
            cities.appendChild(cityOption);
        }
        if (cityName) {
            for (let i = 0; i < data.data.length; i++) {
                const dOption = document.createElement("option");
                dOption.value = data.data[i].Name;
                dOption.text = data.data[i].Name;
                districts.appendChild(dOption);
            }
        }
    }

    function cityChange(event) {
        citiesName = event.target.value
        console.log(citiesName)

    }
    if (cityName) {
        const districtsArr = result123.filter(r => {
            if (r.Name === cityName) {
                districtsName = r.Districts
                return districtsName
            }
        })
    }
</script>