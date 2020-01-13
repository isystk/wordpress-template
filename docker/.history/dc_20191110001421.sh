#! /bin/bash

function usage {
    cat <<EOF
$(basename ${0}) is a tool for ...

Usage:
  $(basename ${0}) [command] [<options>]

Options:
  stats|st          Dockerコンテナの状態を表示します。
  nginx start       Nginxを起動します。
  nginx stop        Nginxを停止します。
  nginx restart     Nginxを再起動します。
  apache start      Apacheを起動します。
  apache stop       Apacheを停止します。
  apache restart    Apacheを再起動します。
  --version, -v     print $(basename ${0}) version
  --help, -h        print this
EOF
}

function version {
    echo "$(basename ${0}) version 0.0.1 "
}

case ${1} in
    stats|st)
        docker container stats
    ;;

    nginx)
      case ${2} in
          start)
              docker-compose up -d nginx
          ;;
          stop)
              docker-compose stop nginx && docker-compose rm -f nginx
          ;;
          restart)
              $(basename ${0}) ${1} stop && $(basename ${0}) ${1} start
          ;;
          *)
              usage
          ;;
      esac
    ;;

    apache)
      case ${2} in
          start)
              docker-compose up -d apache
          ;;
          stop)
              docker-compose stop apache && docker-compose rm -f apache
          ;;
          restart)
              ${0} ${1} stop && ${0} ${1} start
          ;;
          *)
              usage
          ;;
      esac
    ;;

    help|--help|-h)
        usage
    ;;

    version|--version|-v)
        version
    ;;
    
    *)
        echo "[ERROR] Invalid subcommand '${1}'"
        usage
        exit 1
    ;;
esac


