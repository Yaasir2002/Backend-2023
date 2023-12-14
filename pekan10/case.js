const persiapan =  () => {
return new Promise((resolve, reject) =>{
    setTimeout(() => {
        resolve('Menyiapkan Bahan ....')
    }, 3000);
});

};

const rebusAir =  () => {
return new Promise((resolve, reject) =>{
    setTimeout(() => {
        resolve('Merebus Air ....')
    }, 7000);
});

};
const masak =  () => {
return new Promise((resolve, reject) =>{
    setTimeout(() => {
        resolve('Masak Mie ....')
    }, 5000);
});

};

// Consume Promise
const main = () => {
persiapan()
.then((results) => {
    console.log(results);
    return rebusAir();
})
.then ((results) => {
    console.log(results);
    return masak();
})
.then((results) => {
    console.log(results);
})
};


const second = async () => {
    const hasilPersiapan = await persiapan();
    const hasilRebusAir = await rebusAir();
    const hasilMasak = await masak();

    console.log(hasilPersiapan);
    console.log(hasilRebusAir);
    console.log(hasilMasak);
}

second();