require('./bootstrap');

window.Vue = require('vue');

const stream = require('getstream');

axios
    .get('api/getstream/token')
    .then(function (response) {
        console.log(response.data);
        streamSubscribe(response.data);
    });
;

function streamSubscribe(token) {
    const client = stream.connect(window.getStream.key, null, window.getStream.id, {location: 'us-east'});
    const user = client.feed('timeline', window.user_id, token);
    user.subscribe(function (response) {
        console.log(response);
        newActivity(response);
    });
}

function newActivity(activity) {
    console.log(activity.new[0]);
    axios
        .get('api/dweet', {
            params: {
                id: activity.new[0].foreign_id.split(':')[1]
            }
        })
        .then(
            response => {
                console.log(response.data);
                if(!_.includes(dweet.dweet.map(dweet=>dweet.dweet.id),response.data.dweet.id)){
                    dweet.dweet.unshift(response.data);
                }
            }
        )
}

Vue.component('dweet-timeline', require('./components/DweetTimeline.vue'));

const dweet = new Vue({
    el: '#dweet-timeline',
    data: {
        dweet: window.activities
    }
});

window.dweet = dweet;

window.submit_dweet = function (e) {
    e.preventDefault();
    let submit_dweet = document.getElementById('new-dweet').value;
    axios
        .post('api/dweet', {dweet: submit_dweet})
        .then(response => {
            dweet.dweet.unshift(response.data);
            console.log(response.data);
            document.getElementById('new-dweet').value = null;
        })
        .catch((error) => {
        })
    ;
};