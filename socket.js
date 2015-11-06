var server = require('http').Server();

var io = require('socket.io')(server);

//redis
var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('test-channel');

redis.on('message', function(channel, message) {
    message = JSON.parse(message);
    console.log(message.data);
    io.emit(channel + ':' + message.event, message.data);
});

//normal chat

io.on('connection', function(socket) {
    socket.on('chat.message', function(message) {
        io.emit('chat.message', message);
    });

    socket.on('disconnect', function() {
        io.emit('chat.message', 'User has disconnected.');
    });
});


server.listen(3000);