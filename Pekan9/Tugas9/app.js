// TODO 9:
// - Import semua method FruitController
// - Refactor variable ke ES6 Variable
// @hint - Gunakan Destructing Object

// Impor semua method dari FruitController
const FruitController = require('./Controller/FruitController'); 

// Refaktor variabel ke ES6 Variable dengan destructuring
const { index, store, update, destroy } = FruitController;

const main = () => {
  console.log("Method index - Menampilkan Buah");
  index();
  console.log("\nMethod store - Menambahkan buah Pisang");
  store("Pisang");
  index();
  console.log("\nMethod update - Update data 0 menjadi Kelapa");
  update(0, "Kelapa");
  index();
  console.log("\nMethod destroy - Menghapus data 0");
  destroy(0);
  index();
};

main();
