<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


class Autenficacao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

     

    public function handle(Request $request, Closure $next)
    {
        Log::debug('Passou aqui');

        $nivel = 1;

        $routes = Route::currentRouteName();

        $route = explode('.',$routes);

        $submenus = $route[0];
        $metodos = $route[1];



        if($nivel == 1){
            if($submenus == 'cursos' || $submenus == 'eixos'){
                if($metodos == 'index') return $next($request);
            }
        }else if($nivel == 2){
            if($submenus == 'matriculas' || $submenus == 'docencias') return response()->view('templates.erro',compact('submenus'));
            if($submenus == 'eixos' || $submenus == 'cursos'){ return $next($request); }
            else{
                if($metodos == 'index') return $next($request); 
            }
        }else{
            return $next($request);
        }

        

        return response()->view('templates.erro',compact('submenus'));
    }
}
