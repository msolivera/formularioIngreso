CONTROLADOR DE LA API DE USUARIOS PARA EJEMPLO

/**
     * retorna lista de usuarios
     */
    public function index(){

        $usuarios = User::all();

        return $this->successResponse($usuarios);
    }

    
    /**
     * crea instancia de usuarios
     */
    public function store(Request $request)
    {
        $rules = [
            'ci' => 'required|unique:users|numeric|min: 10000000|max: 90000000',
            'password' => 'required|min:8|max:20',
        ];

        $this-> validate($request, $rules);

        $usuario = User::create($request->all());
       
        return $this->successResponse($usuario, Response::HTTP_CREATED);
    }

    /**
     * mostrar info de un usuario en particular
     */
    public function show($usuario){

        $usuario = User::findOrFail($usuario);
        
        return $this->successResponse($usuario);
        
    }

    /**
     * actualiza informacion de usuarios
     */
    public function update(Request $request, $usuario){

        $rules = [
            'password' => 'min:8|max:20',
        ];
        $this-> validate($request, $rules);
        $usuario  = User::findOrFail($usuario);

        $usuario->fill($request->all());
        if($usuario->isClean()){

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $usuario->save();
        return $this->successResponse($usuario);

    }

    
    /**
     * remueve un usuario
     */
    public function destroy($usuario){

        $usuario = User::findOrFail($usuario);
        $usuario->delete();

        return $this ->successResponse($usuario);

        
    }





EJEMPLO DE RULES EN UNIDADES LUMEN

$rules = [
            'nombre' => 'required|min:5',
            'siglas' => [
                'required',
                'min:4',
                'max:10',
                'unique:unidades'
            ],
            'tipo' => 'required|in:gran mando,unidad,reparticion',
        ];