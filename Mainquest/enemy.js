function random(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}

class enemy{
    constructor(nivel){
        this.nivel = nivel;
        this.Vida = random(5,8) * this.nivel;

    }

    attack(pv){
        const Porrada = random(5,10) * this.nivel;
        return pv-=Porrada;
    }
}




