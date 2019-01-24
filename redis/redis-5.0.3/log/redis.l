32529:C 23 Jan 2019 16:58:49.538 # oO0OoO0OoO0Oo Redis is starting oO0OoO0OoO0Oo
32529:C 23 Jan 2019 16:58:49.538 # Redis version=5.0.3, bits=64, commit=969af334, modified=1, pid=32529, just started
32529:C 23 Jan 2019 16:58:49.538 # Configuration loaded
32529:M 23 Jan 2019 16:58:49.540 # You requested maxclients of 10000 requiring at least 10032 max file descriptors.
32529:M 23 Jan 2019 16:58:49.540 # Server can't set maximum open files to 10032 because of OS error: Operation not permitted.
32529:M 23 Jan 2019 16:58:49.540 # Current maximum open files is 4096. maxclients has been reduced to 4064 to compensate for low ulimit. If you need higher maxclients increase 'ulimit -n'.
                _._                                                  
           _.-``__ ''-._                                             
      _.-``    `.  `_.  ''-._           Redis 5.0.3 (969af334/1) 64 bit
  .-`` .-```.  ```\/    _.,_ ''-._                                   
 (    '      ,       .-`  | `,    )     Running in standalone mode
 |`-._`-...-` __...-.``-._|'` _.-'|     Port: 6379
 |    `-._   `._    /     _.-'    |     PID: 32529
  `-._    `-._  `-./  _.-'    _.-'                                   
 |`-._`-._    `-.__.-'    _.-'_.-'|                                  
 |    `-._`-._        _.-'_.-'    |           http://redis.io        
  `-._    `-._`-.__.-'_.-'    _.-'                                   
 |`-._`-._    `-.__.-'    _.-'_.-'|                                  
 |    `-._`-._        _.-'_.-'    |                                  
  `-._    `-._`-.__.-'_.-'    _.-'                                   
      `-._    `-.__.-'    _.-'                                       
          `-._        _.-'                                           
              `-.__.-'                                               

32529:M 23 Jan 2019 16:58:49.542 # WARNING: The TCP backlog setting of 511 cannot be enforced because /proc/sys/net/core/somaxconn is set to the lower value of 128.
32529:M 23 Jan 2019 16:58:49.542 # Server initialized
32529:M 23 Jan 2019 16:58:49.542 # WARNING overcommit_memory is set to 0! Background save may fail under low memory condition. To fix this issue add 'vm.overcommit_memory = 1' to /etc/sysctl.conf and then reboot or run the command 'sysctl vm.overcommit_memory=1' for this to take effect.
32529:M 23 Jan 2019 16:58:49.542 # WARNING you have Transparent Huge Pages (THP) support enabled in your kernel. This will create latency and memory usage issues with Redis. To fix this issue run the command 'echo never > /sys/kernel/mm/transparent_hugepage/enabled' as root, and add it to your /etc/rc.local in order to retain the setting after a reboot. Redis must be restarted after THP is disabled.
32529:M 23 Jan 2019 16:58:49.543 * Ready to accept connections
32529:signal-handler (1548234431) Received SIGINT scheduling shutdown...
32529:M 23 Jan 2019 17:07:11.907 # User requested shutdown...
32529:M 23 Jan 2019 17:07:11.907 * Saving the final RDB snapshot before exiting.
32529:M 23 Jan 2019 17:07:12.008 * DB saved on disk
32529:M 23 Jan 2019 17:07:12.008 * Removing the pid file.
32529:M 23 Jan 2019 17:07:12.009 # Redis is now ready to exit, bye bye...
