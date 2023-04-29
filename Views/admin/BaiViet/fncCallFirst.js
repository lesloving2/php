// // const jsonFile = require('./company.json')

// const fncCallFirst = async () => {
//     try {
//         var Parameter = {
//             url: "../Assets/js/data.json",
//             method: "GET",
//             responseType: "application/json",
//             type: "city"
//         };

//         var Parameter2 = {
//             url: "../company.json",
//             method: "GET",
//             responseType: "application/json",
//             type: "company"

//         };
//         const paramArr = [Parameter, Parameter2]
//         let cityData
//         let result = []
//         for (let i = 0; i < paramArr.length; i++) {
//             const getRes = await fetch(paramArr[i].url)
//             const data = await getRes.json()
//             result.push({
//                 typeParam: paramArr[i].type,
//                 data: data
//             })
//         }


//         // const getRes2 = await fetch(Parameter2.url)
//         // const dataaa2 = await getRes.json()
//         // const getRes1 = await fetch(Parameter.url)
//         // const dataaa1 = await getRes.json()

//         // return final = [{
//         //     typeFnc: 2,
//         //     data: dataaa2
//         // }, {
//         //     typeFnc: 1,
//         //     data: dataaa1
//         // }]



//         // console.log(result1, 'xin chao cac ban')
//         for (let i = 0; i < result.length; i++) {
//             // console.log(result1[i].data, 123)

//             if (result[i].typeParam.toString() === 'company') {
//                 // console.log(result1[i].data, 'result1[i].data')
//                 // await renderCongTy(result1[i].data); // hàm lấy dữ liệu
//                 cityData = result[i].data
//                 console.log(cityData, 'cityData')
//             }

//             //if (result1[i].typeParam.toString() === 'company') await changeCompany(result1[i].data);
//         }


//     } catch (error) {
//         console.log(error, 'cút')
//     }
// }
// module.export = fncCallFirst


