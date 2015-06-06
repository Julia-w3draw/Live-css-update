<!DOCTYPE html>
	<html>
		<head></head>
		<body>
			<div id='one' onclick='_update_css()' style='width: 200px;height: 200px;background: #5D7AFC'>
				Click me to update CSS
			</div>
		</body>
		<script>

			//add css attributes with overwrite option
			HTMLElement.prototype._add_style=function(_new_text_style,_overwrite){
				//sanity:
				if (_new_text_style==undefined){_error("_add_style() _new_text_style==undefined")}
				//:sanity
				var _old_text_style=this.style.cssText
				_old_text_style=_old_text_style.replace(/[\n\r\t\ ]/g,'')
				var _temp=_old_text_style.split(';')   
				var _temp1=[]	
				var _old_array_style=[]
				for (var c=0;c<_temp.length;c++){
					if (_temp[c]!="" && _temp[c]!=undefined){
						_temp1=_temp[c].split(':')
						_old_array_style[_temp1[0]]=_temp1[1]
					}		
				}	
				var _new_text_str=_new_text_style
				if(!_new_text_str.replace)_error('_add_style() in '+this.id+'error: typeof _new_text_str:'+ typeof _new_text_str+_new_text_str)
				_new_text_str=_new_text_str.replace(/[\n\r\t\ ]/g,'')
				var _temp=_new_text_str.split(';')
				var _temp2=[]
				var _new_array_style=[]
				for (var c=0;c<_temp.length;c++){
					if (_temp[c]!="" && _temp[c]!=undefined){
						_temp2=_temp[c].split(':')
					_new_array_style[_temp2[0]]=_temp2[1]
					}		
				}				
				for(var c in _new_array_style){
					if(_overwrite || _old_array_style[c]==undefined){_old_array_style[c]=_new_array_style[c]}
				}
				var _final_text_style=""
				for(var c in _old_array_style){_final_text_style+=c+':'+_old_array_style[c]+"; "}
				this.style.cssText=_final_text_style
			}
			
			//EXAMPLE:
			function _update_css() {
				var one=document.getElementById('one')
				one._add_style('height:100px;margin-left:50px',true)
			}
			</script>		
	</html>
