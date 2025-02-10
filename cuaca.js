"use strict";

const e = React.createElement;
const xhttp = new XMLHttpRequest();

class TombolCuaca extends React.Component {
    constructor(props) {
        super(props);
        this.state = { tampilkan: false };
    }

    render() {
        if (this.state.tampilkan) {
            // Get data info lokasi
            xhttp.onload = function () {
                let responKelurahan = JSON.parse(this.responseText);
                let kode_kelurahan = responKelurahan[0].Key;

                xhttp.onload = function () {
                    let responCuaca = JSON.parse(this.responseText);
                    document.getElementById("cuaca1").innerHTML = responCuaca.DailyForecasts[0].Day.IconPhrase;
                    document.getElementById("cuaca2").innerHTML = responCuaca.DailyForecasts[1].Day.IconPhrase;
                    document.getElementById("cuaca3").innerHTML = responCuaca.DailyForecasts[2].Day.IconPhrase;
                };

                xhttp.open(
                    "GET",
                    "http://dataservice.accuweather.com/forecasts/v1/daily/5day/" +
                        kode_kelurahan +
                        "?apikey=wLtuUHiWcVLItTIUA1FzI0IB2oWvKP5W&language=id",
                    true
                );
                xhttp.send();
            };

            xhttp.open(
                "GET",
                "http://dataservice.accuweather.com/locations/v1/cities/autocomplete?apikey=wLtuUHiWcVLItTIUA1FzI0IB2oWvKP5W&q=" +
                    kelurahan,
                true
            );
            xhttp.send();
        }

        return e(
            "button",
            { onClick: () => this.setState({ tampilkan: true }) },
            "Cek Cuaca"
        );
    }
}

const domContainer = document.querySelector("#tombol_cek_cuaca");
const root = ReactDOM.createRoot(domContainer);
root.render(e(TombolCuaca));
