#! /bin/bash

function usage {
    cat <<EOF
$(basename ${0}) is a tool for ...

Usage:
  $(basename ${0}) [command] [<options>]

Options:
  stats|st
  nginx [start|stop|restart]
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
              stop && start
          ;;
          *)
              usage
          ;;
      esac

        docker-compose up -d nginx
    ;;

    stop)
        docker-compose stop nginx && docker-compose rm -f nginx
    ;;

    restart)
        stop && start
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


