// Mengimpor method dalam controller
const {index,store} = require('./fruitController')

const main = () => {
    console.log(`Menampilkan Semua Data Buah :`);
    index();

    console.log('\n');
    store('Durian');
}

main();
