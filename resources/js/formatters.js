const formatBrl = (value) => {
    let val = (value / 1).toFixed(2).replace('.', ',')
    return `R$ ${val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")}`
}


export { formatBrl }

