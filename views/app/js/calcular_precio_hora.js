function calcular(){
    var nHoras,nMinutos,precioHora,precioTotal;
    var calculaTotal;
    var precioMinuto;
    nHoras=__('nro_horas').value;
    nMinutos=__('nro_minutos').value;
    precioHora=__('precio_hora').value;

    precioMinuto=precioHora/60;
    calculaTotal=(precioHora*nHoras)+(precioMinuto*nMinutos);
    precioTotal=__('precio_total').value=calculaTotal;
    alert('horas: ' + nHoras + ' minutos: ' + nMinutos + ' precio por hora: ' + precioHora);
}