



const result = () => {
    let arr = [12, 22, 33, 84, 65, 16, 97, 48, 29, 6]
    let output = 0
    arr.forEach(element => {
        if (element % 2 == 0) {
            output += element;
        }
    });
    return output;
}

 
 