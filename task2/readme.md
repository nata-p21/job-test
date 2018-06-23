- декодировала код с помощью http://ddecode.com/hexdecoder/ и отформатировала в PhpStorm, отформати
- запустила xdebug profiler
![image](https://user-images.githubusercontent.com/21190009/41809525-d177536a-76f7-11e8-93e6-dea6a9a86750.png)

- проблема в list_folders_in_folder_callback->callback, там был вызов sleep(1); получается, когда файлов становилось больше 20, то задержка скрипта становилась больше 20 секунд
