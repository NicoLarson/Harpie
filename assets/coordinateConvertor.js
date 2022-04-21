let dmsArray = [["05°02.260", "52°27.772"], ["05°02.320", "47°26.397"]]

/**
 * It takes a string of the form "DD MM SS" and returns a decimal degree value.
 * @param dms - The array of values that you want to convert.
 * @returns A function that takes a string of DMS coordinates and returns a decimal degree value.
 */
let dmsToDd = (dms) => {
    let dd

    let dVal = parseFloat(dms[0])
    let mVal = parseFloat(dms[1])
    let sVal = parseFloat(dms[2])

    if (dVal < 0) {
        dd = (Math.abs(dVal + (mVal / 60) + (sVal / 3600))) * -1
    } else {
        dd = dVal + (mVal / 60) + (sVal / 3600)
    }

    return dd
}

let ddToDms = (dd) => {
    let dms = []
    let dVal = Math.floor(dd)
    let mVal = Math.floor((dd - dVal) * 60)
    let sVal = Math.floor((dd - dVal - (mVal / 60)) * 3600)

    dms.push(dVal)
    dms.push(mVal)
    dms.push(sVal)

    return dms
}

let dmsSplit = (dsmString) => {
    let result = []
    for (let i = 0; i < dsmString.length; i++) {
        let dms = dsmString[i].split("°")
        dms[1] = dms[1].split(".")
        dms = [].concat(...dms);
        result.push(dms)
    }
    return [result[0], result[1]]
}
