// Impor Data
const fruits = require ('./data.js');

//Menampilkan Semua Data
const index = () => {
    for (const fruit of fruits) {
        console.log(fruit);
    }
}

// Meanambahkan Data
const store = (name) => {
    fruits.push(name);

    console.log(`Menambahkan data ${name}
    Daftar Buah :`);
    index();
}

//Mengekspor Data
module.exports = {index, store}